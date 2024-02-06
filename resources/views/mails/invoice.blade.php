<html>

<body
    style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table
        style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #641FE5;">
        <thead>
            <tr>
                <th style="text-align:left;"><img style="max-width: 150px;"
                        src="https://github.com/MarwanF611/stage-clientflow/blob/bb11515775f319cf51683652be6c5e0150c4a044/public/logo_clientflow_transparent.png?raw=true"
                        alt="Clientflow"></th>
                <th style="text-align:right;font-weight:400;">
                    {{ now()->format('d/m/Y') }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:150px">Invoice status</span><b
                            style="color:green;font-weight:normal;margin:0">
                            {{ $invoice->status }}
                        </b></p>
                    <p style="font-size:14px;margin:0 0 6px 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Invoice ID</span>
                        #{{ $invoice->id }}</p>
                    </p>
                    <p style="font-size:14px;margin:0 0 0 0;"><span
                            style="font-weight:bold;display:inline-block;min-width:146px">Invoice total</span> Rs.
                        6000.00</p>
                </td>
            </tr>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px">Name</span>
                        {{ $name }}
                    </p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Email</span>
                        {{ auth()->user()->email }}
                    </p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Phone</span> /</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">ID No.</span>
                        {{ auth()->user()->id }}
                    </p>
                </td>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
                            style="display:block;font-weight:bold;font-size:13px;">Address</span> Khudiram Pally,
                        Malbazar, West Bengal, India, 735221</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Products</td>
            </tr>
            <tr>
                <td colspan="2" style="padding:15px;">
                    @foreach ($products as $product)
                        <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                            <span style="display:block;font-size:13px;font-weight:normal;">
                                {{ $product->details->name }}
                            </span> € {{ $product->details->price * $product->amount }} <b
                                style="font-size:12px;font-weight:300;"> Qty.
                                {{ $product->amount }}</b>
                        </p>
                    @endforeach
                </td>
            </tr>
        </tbody>
        <tfooter>
            <tr>
                <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                    <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Clientflow<br> Timbuktu,
                    India<br><br>
                    <b>Phone:</b> 03552-222011<br>
                    <b>Email:</b> contact@clientflow.in
                </td>
            </tr>
        </tfooter>
    </table>
</body>

</html>
