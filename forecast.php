<?php
    header("Content-type: text/xml");

    $filename = '/volume1/web/cisco/yahoo.json';
    $weather_data = file_get_contents($filename);
    $data = json_decode($weather_data);
    $days = 10;
?>

<CiscoIPPhoneText>
<Title>10 Day Weather Forecast</Title>
<Text>
<?php
    for ($i = 0; $i < $days; $i++) {
        $datestamp = $data->forecasts[$i]->date;
        echo gmdate("D, F jS, Y", $datestamp) . "\n";
        echo "   " . $data->forecasts[$i]->high . "F High, ";
        echo $data->forecasts[$i]->low . "F Low\n";
		echo "   " . $data->forecasts[$i]->text;
        
        if ($i < $days - 1)
            echo "\n";
    }
?>
</Text>
<Prompt>Provided by Yahoo! Weather</Prompt>
</CiscoIPPhoneText>

