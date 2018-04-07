<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', '') }}数据字典</title>
    <link rel="stylesheet" href="{{ asset('vendor/laravel-ddoc/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-ddoc/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-ddoc/css/ddoc.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-ddoc/css/animate.min.css') }}">
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top overlay" id="sidebar-wrapper" role="navigation">
        <div class="export-wrap">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-cloud-download"></i> 导出文档
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="{{ route('ddoc.export','html') }}"><i class="fa fa-file-zip-o"></i> Html</a></li>
                    <li><a href="{{ route('ddoc.export','pdf') }}"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                    <li><a href="{{ route('ddoc.export','md') }}"><i class="fa fa-file-pdf-o"></i> Markdown</a></li>

                </ul>
            </div>
        </div>
        <ul class="nav sidebar-nav">
            @foreach($tables as $table)
                <li>
                    <a href="#{{ $table->Name }}">
                        {{ $table->Name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1" id="content">
                    <div class="page-header" align="center">
                        <h1>{{ config('app.name', '') }}数据字典</h1>
                    </div>
                    @foreach($tables as $key => $table)
                        <div class="table-item" id="{{ $table->Name }}">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $key+1 }}.&nbsp;{{ $table->Name }}</div>
                                <div class="panel-body">
                                    {{ $table->Comment }}
                                </div>
                                <table class="table table-hover table-bordered table-striped" style="table-layout:fixed;">
                                    <thead>
                                    <tr class="info">
                                        <th width="10%" class="text-center">字段</th>
                                        <th width="16%" class="text-center">类型</th>
                                        <th width="10%" class="text-center">为空</th>
                                        <th width="5%" class="text-center">键</th>
                                        <th width="16%" class="text-center">默认值</th>
                                        <th width="16%" class="text-center">特性</th>
                                        <th width="22%" class="text-center">备注</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($table->columns as $column)
                                        <tr>
                                            <td width="10%" style="word-wrap: break-word">{{ $column->Field }}</td>
                                            <td width="16%" style="word-wrap: break-word">{{ $column->Type }}</td>
                                            <td width="10%" class="text-center" style="word-wrap: break-word">{{ $column->Null }}</td>
                                            <td width="5%" class="text-center">{{ $column->Key }}</td>
                                            <td width="16%" style="word-wrap: break-word">{{ $column->Default }}</td>
                                            <td width="16%" style="word-wrap: break-word">{{ $column->Extra }}</td>
                                            <td width="22%" style="word-wrap: break-word">{{ $column->Comment }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($key !== (count($tables)-1))
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="scroll-top" style="display: none;">
            <a class="scroll-icon-top" href="javascript:;" title="返回顶部"><i class="fa fa-chevron-up"></i></a>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <footer>
        <div id="auth">
            <a href="{{ config('laravel-ddoc.copyright.link') }}" target="_blank">{{ config('laravel-ddoc.copyright.text') }}</a>
        </div>
    </footer>
</div>

<script src="{{ asset('vendor/laravel-ddoc/js/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-ddoc/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-ddoc/js/ddoc.js') }}"></script>
</body>
</html>
