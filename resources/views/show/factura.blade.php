<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura de Compra #{{ $venta->id }}</title>
    <style>
        @page {
            margin: 18mm 15mm;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #2f2f2e;
            font-size: 11pt;
            line-height: 1.4;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .brand-title {
            font-size: 24pt;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #111111;
        }
        .invoice-title {
            text-align: right;
            font-size: 14pt;
            color: #b50058; /* El tono magenta de NEOGAUCHO */
            font-weight: bold;
        }
        .info-section {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        .info-col {
            width: 50%;
            vertical-align: top;
        }
        .info-label {
            font-size: 9pt;
            color: #5c5b5b;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .items-table th {
            border-bottom: 2px solid #2f2f2e;
            padding: 8px 4px;
            text-align: left;
            font-size: 10pt;
            text-transform: uppercase;
            font-weight: bold;
        }
        .items-table td {
            padding: 10px 4px;
            border-bottom: 1px solid #dfdcdc;
            font-size: 11pt;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .total-section {
            width: 100%;
            border-collapse: collapse;
        }
        .total-box {
            text-align: right;
            font-size: 14pt;
            font-weight: bold;
            padding: 15px 4px;
            border-top: 2px solid #2f2f2e;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 9pt;
            color: #5c5b5b;
            border-top: 1px solid #dfdcdc;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td>
                <div class="brand-title">NEOGAUCHO</div>
                <small style="color: #5c5b5b;">Curaduría de Archivo & Moda Vintage</small>
            </td>
            <td class="invoice-title">
                COMPROBANTE DE COMPRA<br>
                <span style="font-size: 11pt; color: #2f2f2e; font-weight: normal;">N° #0000-{{ str_pad($venta->id, 4, '0', STR_PAD_LEFT) }}</span>
            </td>
        </tr>
    </table>

    <table class="info-section">
        <tr>
            <td class="info-col">
                <div class="info-label">Emisor</div>
                <strong>NEOGAUCHO Studio</strong><br>
                Corrientes, Argentina<br>
                info@neogaucho.com
            </td>
            <td class="info-col" style="padding-left: 20px;">
                <div class="info-label">Detalle de Facturación</div>
                <strong>Fecha:</strong> {{ $venta->created_at->format('d/m/Y H:i') }} hs<br>
                <strong>Cliente:</strong> {{ $venta->user->name ?? 'Invitado' }}<br>
                <strong>Email:</strong> {{ $venta->user->email ?? $venta->email_invitado }}
            </td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>Pieza / Descripción</th>
                <th class="text-center">Talle</th>
                <th class="text-center">Cant.</th>
                <th class="text-right">Precio Unitario</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalles as $item)
                <tr>
                    <td>
                        <strong>{{ $item->producto->nombre }}</strong><br>
                        <small style="color: #5c5b5b;">{{ $item->producto->diseñador ?? 'Colección de Archivo' }}</small>
                    </td>
                    <td class="text-center">{{ strtoupper($item->talle) }}</td>
                    <td class="text-center">{{ $item->cantidad }}</td>
                    <td class="text-right">${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                    <td class="text-right">${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="total-section">
        <tr>
            <td style="width: 60%;"></td>
            <td style="width: 40%;">
                <div class="total-box">
                    <span style="font-size: 10pt; font-weight: normal; margin-right: 15px;">TOTAL GENERAL:</span>
                    ${{ number_format($venta->total, 2, ',', '.') }}
                </div>
            </td>
        </tr>
    </table>

    <div class="footer">
        Gracias por adquirir una pieza de archivo histórica. NEOGAUCHO • Autenticidad Garantizada.
    </div>

</body>
</html>