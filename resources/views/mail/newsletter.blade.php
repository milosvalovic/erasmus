<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>@lang('app.newsletter_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/png" href="{{ asset('fav/favicon.ico') }}"/>
</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#70bbd9"
                        style="font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                        <img src="{{asset('img/newsletter_header.jpg')}}" alt="@lang('app.newsletter_title')"
                             width="749" height="207" style="display: block;"/>
                    </td>
                </tr>
                @for($i=0; $i< sizeof($newsletterObject->seasons);$i++)
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="260" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td>
                                                                <a href="#"><img
                                                                            src="{{url('/') . $newsletterObject->seasons[$i]['university']['thumb_url']}}"
                                                                            alt="{{$newsletterObject->seasons[$i]['country']['name']}}"
                                                                            width="100%" height="170"
                                                                            style="display: block; border-radius: 10px"/></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 10px 0 0 0; font-family: Arial, sans-serif; font-size: 24px; text-align: center">
                                                                <a href="#"
                                                                   style="text-decoration: none; color: #007183;"><b>{{$newsletterObject->seasons[$i]['university']['name'] . ' (' . $newsletterObject->seasons[$i]['country']['name'] . ') - '. $newsletterObject->seasons[$i]['mobility']['mobility_type']['name'] }}</b></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center;">
                                                                <b>{{date('d.m.Y' ,strtotime($newsletterObject->seasons[$i]['date_start_mobility'])) . ' - ' . date('d.m.Y' ,strtotime($newsletterObject->seasons[$i]['date_end_mobility']))}}</b><br>
                                                                @if(strlen($newsletterObject->seasons[$i]['university']['info'])>100 ) {{substr($newsletterObject->seasons[$i]['university']['info'],0,100) . '...'}}
                                                                @else {{$newsletterObject->seasons[$i]['university']['info']}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                    &nbsp;
                                                </td>
                                                @php
                                                    $i++;
                                                @endphp
                                                @if(sizeof($newsletterObject->seasons) >= $i+1)
                                                    <td width="260" valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <a href="#"><img
                                                                                src="{{ url('/') .$newsletterObject->seasons[$i]['university']['thumb_url']}}"
                                                                                alt="{{$newsletterObject->seasons[$i]['country']['name']}}"
                                                                                width="100%" height="170"
                                                                                style="display: block; border-radius: 10px"/></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 10px 0 0 0; font-family: Arial, sans-serif; font-size: 24px; text-align: center">
                                                                    <a href="#"
                                                                       style="text-decoration: none; color: #007183;"><b>{{$newsletterObject->seasons[$i]['university']['name'] . ' (' . $newsletterObject->seasons[$i]['country']['name'] . ') - '. $newsletterObject->seasons[$i]['mobility']['mobility_type']['name']}}</b></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 10px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center;">
                                                                    <b>{{date('d.m.Y' ,strtotime($newsletterObject->seasons[$i]['date_start_mobility'])) . '-' . date('d.m.Y' ,strtotime($newsletterObject->seasons[$i]['date_end_mobility']))}}</b><br>
                                                                    @if(strlen($newsletterObject->seasons[$i]['university']['info'])>100 ) {{substr($newsletterObject->seasons[$i]['university']['info'],0,100) . '...'}}
                                                                    @else {{$newsletterObject->seasons[$i]['university']['info']}}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endif
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endfor
                <tr>
                    <td bgcolor="#007183" style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;"
                                    width="75%">
                                    &reg; @lang('app.email_university_name')
                                    <br/> @lang('app.email_unsubscribe_text') <a
                                            href="{{$newsletterObject->unsubscribe}}" style="color: #ffffff;"><font
                                                color="#ffffff">@lang('app.email_unsubscribe')</font></a>
                                </td>
                                <td align="right" width="25%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                <a href="@lang('url.facebook')" style="color: #ffffff;">
                                                    <img src="{{asset('img/facebook_logo.png')}}" alt="Facebook"
                                                         width="38" height="38" style="display: block;" border="0"/>
                                                </a>
                                            </td>
                                            <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                            <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                <a href="@lang('url.instagram')" style="color: #ffffff;">
                                                    <img src="{{asset('img/insta_logo.png')}}" alt="Instagram"
                                                         width="38" height="38" style="display: block;" border="0"/>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>