@extends('bet.base')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarAnalytics">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin:csv:bet-users')}}">Users (CSV)</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin:csv:bet-user-questions-count') }}" class="btn btn-light">User Questions Count (CSV)</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="width:100%">
        <table class="table table-sm">
            <thead>
                <tr>
                @foreach($ref_stat as $name => $value)
                    <th scope="col">{{ $name }} (with email & erc20)</th>
                @endforeach
                </tr>
            </thead>
            <tr>
                @foreach($ref_stat as $name => $value)
                    <td scope="col">{{ $value['all'] }} ({{ $value['confirmed'] }})</td>
                @endforeach
            </tr>
        </table>
        <div class="row">
            <div class="col-md-12">
                <form method="get">
                    <div class="form-group">
                        <span id="analytics-daterange"
                             style="cursor:pointer"
                             class="{{ ($errors->has('start_date') || $errors->has('end_date'))? ' is-invalid' : '' }}" >
                            <i class="glyphicon glyphicon-calendar"></i>&nbsp;
                            <span></span>
                            <input type="hidden"
                                   name="start_date"
                                   value="{{ request()->get('start_date') }}"
                            />
                            <input type="hidden"
                                   name="end_date"
                                   value="{{ request()->get('end_date') }}"
                            />
                            <i class="glyphicon glyphicon-chevron-down"></i>
                        </span>
                        <button type="submit" class="btn btn-primary" style="margin-left:10px">Submit</button>
                        @foreach ($errors->get('start_date') as $message)
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @endforeach
                        @foreach ($errors->get('end_date') as $message)
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">DAU</th>
                    <th scope="col">7DA</th>
                </tr>
            </thead>
            @foreach($daus as $dau)
                <tr>
                    <td scope="col">{{ $dau->date->format($dau::DATE_FORMAT) }}</td>
                    <td scope="col">{{ number_format($dau->dau) }}</td>
                    <td scope="col">{{ number_format($dau->dau_7) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
