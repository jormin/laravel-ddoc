<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', '') }}数据字典</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-ddoc/css/doc.css') }}">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="content">
                <div class="page-header" align="center">
                    <h1>{{ config('app.name', '') }}数据字典</h1>
                </div>
                @foreach($tables as $table)
                    <div class="table-item">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $loop->iteration }}.&nbsp;{{ $table->Name }}</div>
                            <div class="panel-body">
                                {{ $table->Comment }}
                            </div>
                            <table class="table table-hover table-bordered table-striped" style="table-layout:fixed;">
                                <thead>
                                <tr class="info">
                                    <th width="10%" class="text-center">字段</th>
                                    <th width="16%" class="text-center">类型</th>
                                    <th width="10%" class="text-center">允许为空</th>
                                    <th width="5%" class="text-center">键</th>
                                    <th width="16%" class="text-center">默认值</th>
                                    <th width="16%" class="text-center">特性</th>
                                    <th width="22%" class="text-center">注释</th>
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
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <footer>
        <div id="auth">
            <a href="https://blog.lerzen.com/" target="_blank">&copy;2017 - 悟禅小书童</a>
        </div>
    </footer>
</body>
</html>