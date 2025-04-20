<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Profile - Workaway Style</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        color: #28a745;
    }
    label {
        display: block;
        margin: 15px 0 5px;
        font-weight: bold;
    }
    input, textarea, select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;  
    }
    button:hover {
        background-color: #218838;
    }
    .btn{
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px; 
    }
    .btn:hover{
        background-color: #218838;

    }
    </style>
</head>
<body>
    <div class="container">
    <h2>HOST INFORMATION</h2>
    <form action="../Model/registerHost.php" method="POST" enctype="multipart/form-data">
        <label for="Description">Description:</label>
        <input type="text" id="Description" name="Description" required>
        <label for="Accommodation">Accommodation:</label>
        <input type="text" id="Accommodation" name="Accommodation" required>

        <label for="Country">Country:</label>
        <!-- <input type="text" id="Description" name="Description" required> -->
        <select name="Country" id="Country">
            <option value="">-- Select Country --</option>
            <option value="US">United States</option>
            <option value="GB">United Kingdom</option>
            <option value="CA">Canada</option>
            <option value="AU">Australia</option>
            <option value="DE">Germany</option>
            <option value="FR">France</option>
            <option value="IT">Italy</option>
            <option value="ES">Spain</option>
            <option value="JP">Japan</option>
            <option value="CN">China</option>
            <option value="IN">India</option>
            <option value="BR">Brazil</option>
            <option value="MX">Mexico</option>
            <option value="RU">Russia</option>
            <option value="ZA">South Africa</option>
            <option value="EG">Egypt</option>
            <option value="SA">Saudi Arabia</option>
            <option value="AE">United Arab Emirates</option>
            <option value="NG">Nigeria</option>
            <option value="KR">South Korea</option>
            <option value="SG">Singapore</option>
            <option value="MY">Malaysia</option>
            <option value="TH">Thailand</option>
            <option value="ID">Indonesia</option>
            <option value="TR">Turkey</option>
            <option value="NL">Netherlands</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="BE">Belgium</option>
            <option value="PT">Portugal</option>
            <option value="PL">Poland</option>
            <option value="AR">Argentina</option>
            <option value="CL">Chile</option>
            <option value="CO">Colombia</option>
            <option value="PE">Peru</option>
            <option value="VE">Venezuela</option>
            <option value="PH">Philippines</option>
            <option value="VN">Vietnam</option>
            <option value="IE">Ireland</option>
            <option value="AT">Austria</option>
            <option value="DK">Denmark</option>
            <option value="NO">Norway</option>
            <option value="FI">Finland</option>
            <option value="NZ">New Zealand</option>
            <option value="QA">Qatar</option>
            <option value="KW">Kuwait</option>
            <option value="OM">Oman</option>
            <option value="IL">Israel</option>
            <option value="GR">Greece</option>
            <option value="CZ">Czech Republic</option>
            <option value="HU">Hungary</option>
        </select>

        <label for="RequiredHelp">RequiredHelp:</label>
        <input type="text" id="RequiredHelp" name="RequiredHelp" required>

        <label for="Title">Title:</label>
        <input type="text" id="Title" name="Title" required>

        <label for="State_ID">State ID</label>
        <input type="text" id="State_ID" name="State_ID" required>

        <label for="Dates_Available">Dates Available</label>
        <input type="date" id="Dates_Available" name="Dates_Available" required>

        <label for="Category">Category</label>
        <input type="text" id="Category" name="Category" required>

        <label for="Learning_Opportunities">Learning Opportunities</label>
        <input type="text" id="Learning_Opportunities" name="Learning_Opportunities" required>
        
        <label for="SpokenLanguages">SpokenLanguages:</label>
        
        <select name="SpokenLanguages" id="SpokenLanguages">
            <option value="">-- Select Language --</option>
            <option value="en">English</option>
            <option value="ar">Arabic</option>
            <option value="zh">Chinese</option>
            <option value="es">Spanish</option>
            <option value="fr">French</option>
            <option value="de">German</option>
            <option value="hi">Hindi</option>
            <option value="it">Italian</option>
            <option value="ja">Japanese</option>
            <option value="ko">Korean</option>
            <option value="pt">Portuguese</option>
            <option value="ru">Russian</option>
            <option value="tr">Turkish</option>
            <option value="nl">Dutch</option>
            <option value="sv">Swedish</option>
            <option value="fi">Finnish</option>
            <option value="da">Danish</option>
            <option value="no">Norwegian</option>
            <option value="pl">Polish</option>
            <option value="th">Thai</option>
            <option value="vi">Vietnamese</option>
            <option value="el">Greek</option>
            <option value="he">Hebrew</option>
            <option value="fa">Persian</option>
            <option value="ur">Urdu</option>
            <option value="bn">Bengali</option>
            <option value="ms">Malay</option>
            <option value="id">Indonesian</option>
            <option value="tl">Filipino</option>
            <option value="cs">Czech</option>
            <option value="hu">Hungarian</option>
            <option value="ro">Romanian</option>
            <option value="uk">Ukrainian</option>
            <option value="ca">Catalan</option>
            <option value="sr">Serbian</option>
            <option value="hr">Croatian</option>
            <option value="sk">Slovak</option>
            <option value="sl">Slovenian</option>
            <option value="et">Estonian</option>
            <option value="lv">Latvian</option>
            <option value="lt">Lithuanian</option>
            <option value="bg">Bulgarian</option>
            <option value="mk">Macedonian</option>
            <option value="sq">Albanian</option>
            <option value="sw">Swahili</option>
            <option value="am">Amharic</option>
            <option value="zu">Zulu</option>
           </select>

        <label for="CardInformation">CardInformation:</label>
        <input type="text" id="CardInformation" name="CardInformation" required>
        <!-- <button type="submit" name="submet">Submit</button> -->
        <input type="submit" class="btn" value="submit" name="submit">

    </form>
    </div>
</body>
</html>