<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    <p>Order From: {{ $contactInfo['name'] }},</p>
    <p>Below are the details of the products you have requested. We will contact you shortly to confirm the details and proceed with your order.</p>

    @foreach ($allProductsData as $productData)
        <p><strong>Product Information</strong></p>
        <ul>
            <li>Product Name: {{ $productData['product']->name }}</li>
            <li>Product Type: {{ @$productData['type']->name }}</li>
            @foreach ($productData['inventories'] as $inventory)
                <li>Extra: {{ $inventory->name }} - Quantity: {{ $inventory->quantity }}</li>
            @endforeach
        </ul>
        <hr>
    @endforeach

    <p><strong>Contact Information</strong></p>
    <ul>
        @isset($contactInfo['name'])
            <li>Name: {{ $contactInfo['name'] }}</li>
        @endisset
    
        @isset($contactInfo['email'])
            <li>Email: {{ $contactInfo['email'] }}</li>
        @endisset
    
        @isset($contactInfo['phone'])
            <li>Phone: {{ $contactInfo['phone'] }}</li>
        @endisset

        @isset($contactInfo['date'])
            <li>Date: {{ $contactInfo['date'] }}</li>
        @endisset
    
        @isset($contactInfo['event_type'])
            <li>Event Type: {{ $contactInfo['event_type'] }}</li>
        @endisset
      
    
        @isset($contactInfo['brochure'])
            <li>Brochure: {{ $contactInfo['brochure'] }}</li>
        @endisset
    
        @isset($contactInfo['total_seats'])
            <li>Total Seats: {{ $contactInfo['total_seats'] }}</li>
        @endisset
       
    
        @isset($contactInfo['total_guest'])
            <li>Total Guest: {{ $contactInfo['total_guest'] }}</li>
        @endisset
    
        @isset($contactInfo['venue_post'])
            <li>Venue: {{ $contactInfo['venue_post'] }}</li>
        @endisset

        @isset($contactInfo['notes'])
            <li>Notes: {{ $contactInfo['notes'] }}</li>
        @endisset
        
        <!-- Any additional fields as necessary -->
    </ul>
    
</body>
</html>
