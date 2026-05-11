<?php
include "config.php";

$result =
mysqli_query(
$conn,
"SELECT COUNT(*) AS total
FROM qr_history"
);

$row =
mysqli_fetch_assoc(
$result);

$total_visit =
$row['total'];
?>

<!DOCTYPE html>
<html>

<head>

<title>
QR Generator
</title>

<?php
include
"bootstrap-loader.php";
?>

<link rel="stylesheet"
href="style.css">

<script src=
"https://unpkg.com/vue@3/dist/vue.global.js">
</script>

<script src=
"https://unpkg.com/react@18/umd/react.development.js">
</script>

<script src=
"https://unpkg.com/react-dom@18/umd/react-dom.development.js">
</script>

<script src=
"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
</script>

</head>

<body>

<div id="app">

<div class="topbar">

<div class="logo-box">
QR Generator
</div>

<div class="clock-box">

<div>
{{ time }}
</div>

<small>
{{ date }}
</small>

</div>

</div>

<div class="visit-bar">

This Page is Visited
<?php echo $total_visit; ?>
Times

</div>

<div class="main-container">

<div class="main-title">

Quick Response
(QR)
Code Generator

</div>

<div class="content">

<div class="form-box">

<h3>
Please Fill-out
All Fields
</h3>

<label>
QR Type
</label>

<select
class="form-select"
v-model="type">

<option>
Email
</option>

<option>
URL
</option>

<option>
Text
</option>

<option>
WhatsApp
</option>

<option>
Payment
</option>

</select>

<label class="mt-3">
Input Data
</label>

<input
type="text"
class="form-control"
v-model="data">

<label class="mt-3">
Subject
</label>

<input
type="text"
class="form-control"
v-model="subject">

<label class="mt-3">
Message
</label>

<input
type="text"
class="form-control"
v-model="message">

<button
class="btn btn-primary w-100 mt-4"
@click=
"generateQR">

Submit Query

</button>

</div>

<div class="middle-text">

Barcode
Generation

<div id="react-root">
</div>

</div>

<div class="result-box">

<h2>
QR Code Result:
</h2>

<div class="qr-frame">

<div id="qrcode">
</div>

</div>

<button
class="btn btn-success w-100 mt-4"
@click=
"downloadQR">

Download QR Code

</button>

</div>

</div>

</div>

</div>

<script src="vue-app.js"></script>

<script src="react-widget.js"></script>

</body>

</html>