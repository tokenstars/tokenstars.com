@extends('emails.layout')
@section('content')
        <tr>
            <td colspan="2">
                <p>New player: {{$player->first_name}} {{$player->last_name}}</p>
                <p>ID player: <b>{{$player->id}}</b></p>
                <p> {{$player->created_at}}</p>
                <p> scout: {{$player->scout->rUser->first_name}} {{$player->scout->rUser->last_name}}</p>
                <p> scout email: {{$player->scout->rUser->email}}</p>
            </td>
        </tr>

<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
        <tr>
            <td colspan="2"><br><strong>Step 1</strong></td>
        </tr>
        <tr>
            <td>Type sport</td>
            <td>Tennis</td>
        </tr>
        <tr>
            <td colspan="2"><br><strong>Step 2</strong></td>
        </tr>
        <tr>
            <td>First name</td>
            <td>{{$player->first_name}}</td>
        </tr>
        <tr>
            <td>Last name</td>
            <td>{{$player->last_name}}</td>
        </tr>
        <tr>
            <td>COUNTRY OF RESIDENCE</td>
            <td>{{$player->country->name}}</td>
        </tr>
        <tr>
            <td>CITY OF RESIDENCE</td>
            <td>{{$player->city}}</td>
        </tr>
        <tr>
            <td>DATE OF BIRTH</td>
            <td>{{$player->date_of_birth}}</td>
        </tr>
        <tr>
            <td>AGE</td>
            <td>{{$player->age}}</td>
        </tr>
        <tr>
            <td>SEX</td>
            <td>
                @if ($player->sex == 1)
                    Male
                @else
                    Female
                @endif
            </td>
        </tr>
        <tr>
            <td>NATIONALITY</td>
            <td>{{$player->nationality_name->name}}</td>

        </tr>
        <tr>
            <td>WEIGHT (KG)</td>
            <td>{{$player->weight or ""}}</td>
        </tr>
        <tr>
            <td>HEIGHT (CM)</td>
            <td>{{$player->height or ""}}</td>
        </tr>
        <tr>
            <td>BIO (300 WORDS MAX.)*</td>
            <td>{{$player->description}}</td>
        </tr>
        <tr>
            <td>FACEBOOK</td>
            <td><a href="{{$player->fb_link or "#"}}" target="_blank">{{$player->fb_link or ""}}</a></td>
        </tr>
        <tr>
            <td>TWITTER</td>
            <td><a href="{{$player->tw_link or "#"}}" target="_blank">{{$player->tw_link or ""}}</a></td>
        </tr>
        <tr>
            <td>INSTAGRAM</td>
            <td><a href="{{$player->ig_link or "#"}}" target="_blank">{{$player->ig_link or ""}}</a></td>
        </tr>
        <tr>
            <td>PHOTOS</td>
            <td>
                @if(count($player->images) > 0)
                    <ul>
                        @foreach($player->images as $link)
                            <li><a href="{{$app_url}}{{$link->image}}" target="_blank"><img class="img-thumb-img" src="{{$app_url}}{{$link->image}}" alt="" style="max-width: 130px" width="200"></a> </li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td>LINKS TO MEDIA ARTICLES</td>
            <td>
                @if(count($player->mediaArticlesLinks) > 0)
                    <ul>
                        @foreach($player->mediaArticlesLinks as $link)
                            <li><a href="{{$link->info or "#"}}" target="_blank">{{$link->info or ""}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>

        <tr>
            <td colspan="2"><br><strong>Step 3</strong></td>
        </tr>
        <tr>
            <td>ITF PROFILE (LINK)*</td>
            <td><a href="{{$player->itf_profile or "#"}}" target="_blank">{{$player->itf_profile or ""}}</a></td>
        </tr>
        <tr>
            <td>OTHER RANKING PROFILES (LINK)</td>
            <td><a href="{{$player->other_ranking_profiles or "#"}}" target="_blank">{{$player->other_ranking_profiles or ""}}</a></td>
        </tr>
        <tr>
            <td>ITF CURRENT COMBINED</td>
            <td>{{$player->itf_current_combined or ""}}</td>
        </tr>
        <tr>
            <td>ITF CAREER HIGH COMBINED</td>
            <td>{{$player->itf_career_hight_combined or ""}}</td>
        </tr>
        <tr>
            <td>WIN-LOSS (CURRENT YEAR SINGLES)</td>
            <td>{{$player->win_loss_cys or ""}}</td>
        </tr>
        <tr>
            <td>WIN-LOSS (ALL TIME)</td>
            <td>{{$player->win_loss_at or ""}}</td>
        </tr>
        <tr>
            <td>TITLES SINGLES</td>
            <td>
                @if(count($player->titlesSingles) > 0)
                    <ul>
                        @foreach($player->titlesSingles as $link)
                            <li>{{$link->info or ""}}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td>TITLES DOUBLES</td>
            <td>
                @if(count($player->titlesDoubles) > 0)
                    <ul>
                        @foreach($player->titlesDoubles as $link)
                            <li>{{$link->info or ""}}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td>FINALS SINGLES</td>
            <td>
                @if(count($player->finalSingles) > 0)
                    <ul>
                        @foreach($player->finalSingles as $link)
                            <li>{{$link->info or ""}}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td>FINALS DOUBLES</td>
            <td>
                @if(count($player->finalDoubles) > 0)
                    <ul>
                        @foreach($player->finalDoubles as $link)
                            <li>{{$link->info or ""}}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>

        <tr>
            <td colspan="2"><br><strong>Step 4</strong></td>
        </tr>
        <tr>
            <td>FOREHAND</td>
            <td>
                @if ($player->forehand == 1)
                    Right handed
                @else
                    Left handed
                @endif
            </td>
        </tr>
        <tr>
            <td>BACKHAND</td>
            <td>
                @if ($player->backhand == 1)
                    One-handed
                @else
                    Double-handed
                @endif
            </td>
        </tr>
        <tr>
            <td>AGE STARTED TENNIS</td>
            <td>{{$player->age_started_tennis or ""}}</td>
        </tr>
        <tr>
            <td>FAVORITE SURFACE</td>
            <td>
                @if ($player->fs_hard == 1)
                    Hard<br>
                @endif
                @if ($player->fs_glass == 1)
                    Glass<br>
                @endif
                @if ($player->fs_clay == 1)
                    Clay<br>
                @endif
            </td>
        </tr>
        <tr>
            <td>TRAINING ACADEMY</td>
            <td>{{$player->training_academy or ""}}</td>
        </tr>
        <tr>
            <td>COACH</td>
            <td>{{$player->coach or ""}}</td>
        </tr>
        <tr>
            <td>FORMER COACH(ES)</td>
            <td>{{$player->former_coach or ""}}</td>
        </tr>
        <tr>
            <td>AGENT (IF ANY)</td>
            <td>{{$player->agent or ""}}</td>
        </tr>
        <tr>
            <td>WHO COVERS TENNIS EXPENSES AS OF NOW?</td>
            <td>{{$player->who_covers_now or ""}}</td>
        </tr>
        <tr>
            <td>INJURIES WITHIN LAST 24 MONTHS</td>
            <td>{{$player->injuries_24m or ""}}</td>
        </tr>
        <tr>
            <td>RACQUET BRAND</td>
            <td>{{$player->racquet_brand or ""}}</td>
        </tr>
        <tr>
            <td>STRING BRAND</td>
            <td>{{$player->string_brand or ""}}</td>
        </tr>
        <tr>
            <td>CLOTHING BRAND</td>
            <td>{{$player->clothing_brand or ""}}</td>
        </tr>
        <tr>
            <td>SHOE BRAND</td>
            <td>{{$player->shoe_brand or ""}}</td>
        </tr>
        <tr>
            <td>LINKS TO TRAINING VIDEO</td>
            <td>
                @if(count($player->videoLinks) > 0)
                    <ul>
                        @foreach($player->videoLinks as $link)
                            <li><a href="{{$link->info or "#"}}" target="_blank">{{$link->info or ""}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>

        <tr>
            <td colspan="2"><br><strong>Step 5</strong></td>
        </tr>
        <tr>
            <td>WHAT ARE THE PLAYER’S GOALS FOR THE NEXT SEASON (IF KNOWN)?</td>
            <td>{{$player->goals_for_next_season or ""}}</td>
        </tr>
        <tr>
            <td>HOW THE FINANCIAL SUPPORT FROM TOKENSTARS WILL BE USED (IF KNOWN)?</td>
            <td>{{$player->financial_support_used or ""}}</td>
        </tr>

        <tr>
            <td colspan="2"><br><strong>Step 6</strong></td>
        </tr>
        <tr>
            <td>HOBBY</td>
            <td>{{$player->hobby or ""}}</td>
        </tr>
        <tr>
            <td>FAVORITE PLAYER</td>
            <td>{{$player->favorite_player or ""}}</td>
        </tr>

        <tr>
            <td colspan="2"><br><strong>Step 7</strong></td>
        </tr>
        <tr>
            <td>CONTACT PERSON</td>
            <td>{{$player->contact_person or ""}}</td>
        </tr>
        <tr>
            <td>RELATION</td>
            <td>{{$player->relation or ""}}</td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>{{$player->email or ""}}</td>
        </tr>
        <tr>
            <td>PHONE NUMBER</td>
            <td>{{$player->phone or ""}}</td>
        </tr>
        <tr>
            <td>FILLED OUT BY</td>
            <td>{{$player->filled_out_by or ""}}</td>
        </tr>

@endsection
