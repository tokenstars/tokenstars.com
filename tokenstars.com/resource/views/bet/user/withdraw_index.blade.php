@extends('bet.base')

@section('content')
    <h3>Status filter</h3>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarWithdraw">
            <ul class="nav navbar-nav">
                @foreach ($statusLabels as $status => $label)
                    <li class="nav-item">
                        <a href="?status={{ $status }}" class="btn btn-light">{{ title_case($status) }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a href="{{ route('admin:withdraw:index') }}" class="btn btn-light">All</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="width:100%">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Telegram&nbsp;ID</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Bot&nbsp;Tokens</th>
                <th scope="col">Balance</th>
                <th scope="col">Rating</th>
                <th scope="col">Wallet</th>
                <th scope="col">KYC</th>
                <th scope="col">Withdraw&nbsp;At</th>
                <th scope="col">Send&nbsp;at</th>
                <th scope="col">Amount</th>
                <th scope="col">TX&nbsp;Hash</th>
                <th scope="col">Status</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            @foreach($requests as $request)
                <tr>
                    <td>{{$request->telegram_user->telegram_id}}</td>
                    <td>{{$request->telegram_user->email}}</td>
                    <td><a href="{{route('admin:csv:bet-user', ['user' => $request->telegram_user_id])}}" target="_blank">{{$request->telegram_user->username}}</a></td>
                    <td>{{long_number_format($request->telegram_user->balance)}}</td>
                    <td>{{long_number_format(bcadd($request->telegram_user->balance, bcadd($request->telegram_user->ace_tokens, $request->telegram_user->team_tokens, 4), 4))}}</td>
                    <td>{{long_number_format($request->telegram_user->rating)}}</td>
                    <td>{{$request->telegram_user->wallet}}</td>
                    <td>{{$request->telegram_user->kyc_status}}</td>
                    <td>{{$request->created_at->format("d.m.Y")}}</td>
                    <td>{{$request->created_at->addDays(14)->format("d.m.Y")}}</td>
                    <td>{{long_number_format($request->tokens_amount)}}</td>
                    <td>{{$request->tx_hash}}</td>
                    <td><span class="label {{ $statusLabels[$request->status] }}">{{ strtoupper($request->status) }}</span></td>
                    <td>
                        @if ($request->status == \App\Models\WithdrawRequest::STATUS_NEW)
                            <form method="post" style="display:inline-block;" onsubmit="return confirm('Are you sure')">
                                {{ csrf_field() }}
                                <input type="hidden" name="request_id" value="{{$request->id}}">
                                <input type="hidden" name="withdraw" value="1">
                                <button type="submit" class="btn btn-success" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">Approve</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if (in_array($request->status, [\App\Models\WithdrawRequest::STATUS_NEW, \App\Models\WithdrawRequest::STATUS_FAILED]))
                            <form method="post" style="display:inline-block;" onsubmit="return confirm('Are you sure')">
                                {{ csrf_field() }}
                                <input type="hidden" name="request_id" value="{{$request->id}}">
                                <button type="submit" class="btn btn-danger" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $requests->links() }}
    </div>
@endsection
