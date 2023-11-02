<!DOCTYPE html>
<html>
<head>
    <style>
        /* Your custom styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .bill {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            bOrder: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 24px;
        }

        .customer-info {
            margin-bottom: 20px;
        }

        .customer-info p {
            margin: 0;
            font-size: 16px;
        }

        .Order-details {
            bOrder-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .Order-details p {
            margin: 5px 0;
            font-size: 14px;
        }

        .product-image {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="bill">
        <div class="header">
            <h2>Order Detail</h2>
        </div>
        <div class="customer-info">
            <p><strong>Customer Name:</strong> {{ $Order->name }}</p>
            <p><strong>Email:</strong> {{ $Order->email }}</p>
            <p><strong>Phone:</strong> {{ $Order->phone }}</p>
            <p><strong>Address:</strong> {{ $Order->address }}</p>
        </div>
        <div class="Order-details">
            <h3>Order Details</h3>
            <p><strong>Order ID:</strong> {{ $Order->id }}</p>
            <p><strong>Product Title:</strong> {{ $Order->product_title }}</p>
            <p><strong>Quantity:</strong> {{ $Order->quantity }}</p>
            <p><strong>Price:</strong> {{ $Order->price }}</p>
            <p><strong>Product ID:</strong> {{ $Order->product_id }}</p>
            <p><strong>Payment Status:</strong> {{ $Order->payment_status }}</p>
            <p><strong>Delivery Status:</strong> {{ $Order->delivery_status }}</p>
            <p><strong>Created At:</strong> {{ $Order->created_at }}</p>
            <p><strong>Product Image:</strong> <img class="product-image" src="product/{{ $Order->image }}" alt="Product Image"></p>
        </div>
        <div class="footer">
            <p>Thank you for your Order!</p>
        </div>
    </div>
</body>
</html>
