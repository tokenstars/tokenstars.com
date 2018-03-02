@extends('emails.layout')
@section('content')
    <tr>
        <td>
            <p>New brand feedback from {{$brand->email_brand}}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>
                PROMOTERS' DETAILS:
            </p>
        </td>
        <td>
            <p>
                {{$brand->promo_details}}
            </p>
        </td>
    </tr>

    <tr>
        <td>
            <p>
                PROMOTERS' NAME:
            </p>
        </td>
        <td>
            <p>
                {{$brand->promo_name}}
            </p>
        </td>
    </tr>

    <tr>
        <td>
            <p>
                PROMOTERS' E-MAIL:
            </p>
        </td>
        <td>
            <p>
                {{$brand->promo_email}}
            </p>
        </td>
    </tr>

    <tr>
        <td>
            <p>
                BRAND DETAILS:
            </p>
        </td>
        <td>
            <p>
                {{$brand->brand_details}}
            </p>
        </td>
    </tr>



    <tr>
        <td>
            <p>
                BRAND:
            </p>
        </td>
        <td>
            <p>
                {{$brand->brand}}
            </p>
        </td>
    </tr>



    <tr>
        <td>
            <p>
                CONTACT NAME (BRAND):
            </p>
        </td>
        <td>
            <p>
                {{$brand->contact_name_brand}}
            </p>
        </td>
    </tr>


    <tr>
        <td>
            <p>
                EMAIL (BRAND):
            </p>
        </td>
        <td>
            <p>
                {{$brand->email_brand}}
            </p>
        </td>
    </tr>


    <tr>
        <td>
            <p>
                PHONE:
            </p>
        </td>
        <td>
            <p>
                {{$brand->phone}}
            </p>
        </td>
    </tr>


    <tr>
        <td>
            <p>
                COUNTRY:
            </p>
        </td>
        <td>
            <p>
                {{$brand->country}}
            </p>
        </td>
    </tr>

    <tr>
        <td>
            <p>
                AREA OF SPONSORSHIP:
            </p>
        </td>
        <td>
            <p>
                {{$brand->area_of_sponsor}}
            </p>
        </td>
    </tr>


    <tr>
        <td>
            <p>
                DESIRED ENDORSEMENT FORMAT (IF KNOWN):
            </p>
        </td>
        <td>
            <p>
                {{$brand->desired_format}}
            </p>
        </td>
    </tr>

    <tr>
        <td>
            <p>
                NAME OF THE ATHLETE (OPTIONAL):
            </p>
        </td>
        <td>
            <p>
                {{$brand->name_of_athlete}}
            </p>
        </td>
    </tr>

    <tr>
        <td>
            <p>
                INFORMATION ABOUT THE SPONSORSHIP:
            </p>
        </td>
        <td>
            <p>
                {{$brand->info_about}}
            </p>
        </td>
    </tr>
@endsection

