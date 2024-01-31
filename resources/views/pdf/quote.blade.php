@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>
        Quote {{ $quote->id }}
    </title>

    <style>
        .quote-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .quote-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .quote-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .quote-box table tr td:nth-child(2) {
            text-align: right;
        }

        .quote-box table tr.top table td {
            padding-bottom: 20px;
        }

        .quote-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .quote-box table tr.information table td {
            padding-bottom: 40px;
        }

        .quote-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .quote-box table tr.details td {
            padding-bottom: 20px;
        }

        .quote-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .quote-box table tr.item.last td {
            border-bottom: none;
        }

        .quote-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .quote-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .quote-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .quote-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .quote-box.rtl table {
            text-align: right;
        }

        .quote-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="quote-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://raw.githubusercontent.com/MarwanF611/stage_clientflow/main/public/logo_clientflow_transparent.png"
                                    style="width: 100%; max-width: 200px" />
                            </td>

                            <td>
                                Quote #{{ $quote->id }}<br />
                                Created: {{ Carbon::now()->format('F d, Y') }}<br />
                                Expires: {{ Carbon::now()->addDays(30)->format('F d, Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Sparksuite, Inc.<br />
                                12345 Sunny Road<br />
                                Sunnyville, CA 12345
                            </td>

                            <td>
                                {{ $quote->customer->company_name }}.<br />
                                {{ $quote->customer->street_name }} {{ $quote->customer->house_number }},
                                {{ $quote->customer->postcode }}<br />
                                Tel. {{ $quote->customer->phone_number }}<br />

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>



            <tr class="heading">
                <td>Item</td>

                <td>Price</td>
            </tr>

            @foreach ($products as $product)
                <tr class="item {{ $loop->last ? 'last' : '' }}">
                    <td>{{ $product->details->name }} x{{ $product->amount }}</td>

                    <td>{{ $product->details->price * $product->amount }} EUR</td>
                </tr>
            @endforeach



            <tr class="total">
                <td></td>

                <td>
                    Total:
                    @php
                        $total = 0;
                        foreach ($products as $product) {
                            $total += $product->details->price * $product->amount;
                        }
                        echo '€' . $total . ',-';
                    @endphp
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
