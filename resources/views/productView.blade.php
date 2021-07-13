<!doctype html>

<title>Product Packer</title>
<link href="{{ mix('css/app.css') }}" rel='stylesheet'>
<body>
    
    <form action="item.blade.php" method="GET">
        Article number <input type="number" name='articleNumber' value="" >
        <input type="submit" name="submit" value="Submit">
        
    </form>
</body>