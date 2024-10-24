<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>App de Viajes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        #pantalla1, #pantalla2 {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        select, input[type="number"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        #resultado {
            margin-top: 20px;
            font-size: 1.2em;
        }
        #volver {
            background-color: #28a745;
        }
        #volver:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Consulta de Clima y Cambio</h1>
    <div id="pantalla1">
        <select id="ciudades">
            @foreach ($ciudades as $ciudad)
                <option value="{{ $ciudad->nombre }}">{{ $ciudad->nombre }}</option>
            @endforeach
        </select>
        <input type="number" id="presupuesto" placeholder="Presupuesto en pesos colombianos">
        <button id="buscar">Buscar</button>
    </div>
    
    <div id="pantalla2" style="display:none;">
        <div id="resultado"></div>
        <button id="volver">Volver a seleccionar ciudad</button>
    </div>

    <script>
        $('#buscar').click(function() {
            const ciudad = $('#ciudades').val();
            const presupuesto = $('#presupuesto').val();
            
            $.post('/clima-y-cambio', { ciudad, presupuesto, _token: '{{ csrf_token() }}' }, function(data) {
                $('#resultado').html(`
                    <p>Clima en ${ciudad}: ${data.temperatura} °C</p>
                    <p>Moneda local: ${data.moneda} (${data.simbolo})</p>
                    <p>Presupuesto convertido: ${data.monto_local}</p>
                    <p>Tasa de cambio: ${data.tasa_cambio}</p>
                `);
                $('#pantalla1').hide();
                $('#pantalla2').show();
            });
        });

        $('#volver').click(function() {
            $('#pantalla2').hide();
            $('#pantalla1').show();
            $('#resultado').empty(); 
            $('#presupuesto').val(''); 
        });
    </script>
</body>
</html>
