<?php
    require __DIR__ . '/vendor/autoload.php';
    //parse_str(implode('&', array_slice($argv, 1)), $_GET);
    use \Discord\Webhook;
    use \Discord\Embed;
    use \Discord\File;
    $webhook = new Webhook( 'https://discordapp.com/api/webhooks/647954486169567233/V82LBDEKGDj5DlSRM4kM033yHpu0UXzansNAr6kvBxda2wsHfPzB_TxuIDaNn27gEnWq' );
    $id = $_GET['id'] ?: "1818";
    $name = $_GET['name'] ?: "Unset";
    $playerid = $_GET['userid'] ?: "1";
    $downloaded = fopen("https://www.roblox.com/asset/?id=$id", 'r');
    file_put_contents("$id.rbxm",$downloaded);
    $fileToSend = new File("$id.rbxm","$id-$name.rbxm");
    $webhook
    ->setUsername( "$name ($playerid) (AssetStorer) " ) /*optional*/
    ->setMessage( "" ) /*optional*/
    ->setAvatar("http://www.roblox.com/Thumbs/Avatar.ashx?x=100&y=100&Format=Png&userId=$playerid")
    ->setFile( $fileToSend )
    ->send();
    unlink("$id.rbxm");
    
    echo $id;

