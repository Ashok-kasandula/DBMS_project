<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Modern CSS styling */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      width: 80%;
      max-width: 800px;
      background-color: #f2f2f2;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .payment-methods {
      display: flex;
      flex-direction: column;
      border-right: 1px solid #ccc;
      padding: 20px;
      background-color: #9ac0d9;
      border-top-left-radius: 8px;
      border-bottom-left-radius: 8px;
      color: #c5b9b9;
      border-radius: 5px;
    }
    .payment-methods button {
      padding: 15px;
      border: none;
      background-color: #dae5ed;
      cursor: pointer;
      transition: background-color 0.3s;
      font-size: 18px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      border-radius: 5px;
    }
    .payment-methods button:hover {
      background-color: #ffffff;
    }
    .payment-details {
      padding: 20px;
      background-color: #9ac0d9;
      border-radius: 5px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="number"],
    input[type="password"],
    select {
      width: calc(100% - 24px);
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 16px;
    }
    input[type="button"] {
      width: calc(100% - 24px);
      padding: 12px;
      background-color: #2ecc71;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      font-size: 18px;
    }
    input[type="submit"]:hover {
      background-color: #27ae60;
    }
    .cart-total {
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        font-weight: bold;
        margin: 20px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="payment-methods">
      <h2>Payment Methods</h2>
      <button onclick="showPaymentDetails('creditCard')">
        <i class="fab fa-cc-visa" style="margin-right: 10px;"></i> Credit Card
      </button>
      <button onclick="showPaymentDetails('debitCard')">
        <i class="fab fa-cc-mastercard" style="margin-right: 10px;"></i> Debit Card
      </button>
      <button onclick="showPaymentDetails('upi')">
        <i class="fas fa-mobile-alt" style="margin-right: 10px;"></i> UPI
      </button>
      <button onclick="showPaymentDetails('netBanking')">
        <i class="fas fa-university" style="margin-right: 10px;"></i> Net Banking
      </button>
      <button onclick="showPaymentDetails('cash')">
        <i class="fas fa-money-bill-wave" style="margin-right: 10px;"></i> Cash
      </button>
    </div>
    <div class="payment-details">
      <h2>Payment Details</h2>
      <div class="cart-total">
        <div>Total Amount to be Paid:</div>
        <div>Rs <span id="total-amount"></span></div>
      </div>
      <div id="creditCardDetails" style="display: none;">
     
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required>
        <label for="expiryMonth">Expiry Month:</label>
        <input type="number" id="expiryMonth" name="expiryMonth" min="1" max="12" required>
        <label for="expiryYear">Expiry Year:</label>
        <input type="number" id="expiryYear" name="expiryYear" min="2024" max="2030" required>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>
      </div>
      <div id="debitCardDetails" style="display: none;">
        
        <label for="debitCardNumber">Debit Card Number:</label>
        <input type="text" id="debitCardNumber" name="debitCardNumber" required>
        <label for="debitCardExpiryMonth">Expiry Month:</label>
        <input type="number" id="debitCardExpiryMonth" name="debitCardExpiryMonth" min="1" max="12" required>
        <label for="debitCardExpiryYear">Expiry Year:</label>
        <input type="number" id="debitCardExpiryYear" name="debitCardExpiryYear" min="2024" max="2030" required>
        <label for="debitCardCvv">CVV:</label>
        <input type="text" id="debitCardCvv" name="debitCardCvv" required>
      </div>
      <div id="upiDetails" style="display: none;">
        
        <label for="upiId">Enter UPI ID:</label>
        <input type="text" id="upiId" name="upiId" required>
      </div>
      <div id="netBankingDetails" style="display: none;">
        
        <label for="bank">Select Bank:</label>
        <select id="bank" name="bank">
          <option value="hdfc">HDFC Bank</option>
          <option value="icici">ICICI Bank</option>
          <option value="sbi">State Bank of India</option>
          <option value="axis">Axis Bank</option>
        </select>
      </div>
      <div id="cashDetails" style="display: none;">
        
        <p>Pay with cash at the time of delivery.</p>
      </div>
      <input type="submit" value="Pay Now">
    </div>
  </div>

  <script>
    function showPaymentDetails(paymentMethod) {
      
      document.getElementById('creditCardDetails').style.display = 'none';
      document.getElementById('debitCardDetails').style.display = 'none';
      document.getElementById('upiDetails').style.display = 'none';
      document.getElementById('netBankingDetails').style.display = 'none';
      document.getElementById('cashDetails').style.display = 'none';

      
      switch(paymentMethod) {
        case 'creditCard':
          document.getElementById('creditCardDetails').style.display = 'block';
          break;
        case 'debitCard':
          document.getElementById('debitCardDetails').style.display = 'block';
          break;
        case 'upi':
          document.getElementById('upiDetails').style.display = 'block';
          break;
        case 'netBanking':
          document.getElementById('netBankingDetails').style.display = 'block';
          break;
        case 'cash':
          document.getElementById('cashDetails').style.display = 'block';
          break;
      }
    }

    
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

   
    document.getElementById('total-amount').textContent = getUrlParameter('total');
  </script>
</body>
</html>
