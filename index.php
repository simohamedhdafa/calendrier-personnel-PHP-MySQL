<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
</head>
<body>
    <div id="container">
        <div id="formulaire">
            <form action="#" method="GET">
                <label for="mounths">Choisir un mois:</label>
                <select id="mounths" name="mounths">
                    <option value="0">-----</option>
                    <option value="1">Janvier</option>
                    <option value="2">Fevrier</option>
                    <option value="3">Mars</option>
                    <option value="4">Avril</option>
                    <option value="5">Mai</option>
                    <option value="6">Juin</option>
                    <option value="7">Juillet</option>
                    <option value="8">Août</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Decembre</option>
                </select>

                <label for="year">Choisir une année:</label>
                <select id="year" name="year">
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                </select>
            </form>
        </div>
        <div id="calendrier">
            <div id="year-title">
                <h1>2022</h1>
            </div>
            <div id="months-content">
                <div id="row-1">
                    <span>Jan.</span>
                    <span>Fev.</span>
                    <span>Mars</span>
                </div>
                <div id="row-2">
                    <span>Avr.</span>
                    <span>Mai</span>
                    <span>Juin</span>
                </div>
                <div id="row-3">
                    <span>Juil</span>
                    <span>Aout</span>
                    <span>Sept</span>
                </div>
                <div id="row-4">
                    <span>Oct.</span>
                    <span>Nov.</span>
                    <span>Dec.</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
