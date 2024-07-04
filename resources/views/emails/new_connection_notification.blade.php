<!DOCTYPE html>
<html>

<head>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 350px;
            margin: auto;
            text-align: center;
            font-family: arial;
            padding: 10px;
            border-radius: 10px;
            overflow: hidden;
            background: #33475b;
        }
        
        .card h2, .card p{
        	color: white;
        }

        .card h3 {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #dc3545;
            text-align: center;
            font-size: 18px;
            border-radius: 10px 0 10px 0;
        }

        #customers tr th {
            border-radius: 10px;
        }

        #customers tr th a{
            color: white;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid white;
            padding: 8px;
        }


        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: white;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>New Connection Request</h2>
        <p> <strong>Address:</strong> {{ $formData['address'] }}</p>
        <table id="customers">
            <tr>
                <th>Name: {{ $formData['fullname'] }}</th>
            </tr>
            <tr>
                <th>Phone: {{ $formData['phone'] }}</th>
            </tr>
            <tr>
                <th>Email: {{ $formData['email'] }}</th>
            </tr>
        </table>
        <h3>Package: {{ $formData['package_id'] }}</h2>
    </div>

</body>

</html>
