﻿<?

// проверяем если пришло сообщение
if ($text) {

	if ($message_forward) {	

		if ($forward_username!='отсутствует') $forward_username = "@".$forward_username;
		
		$forward_first_name = str_replace ("_", "\_", $forward_first_name);
		$forward_last_name = str_replace ("_", "\_", $forward_last_name);
		$forward_username = str_replace ("_", "\_", $forward_username);
		
		$reply = "Информация о пользователе:\n".
			"id: [".$forward_id."](tg://user?id=".$forward_id.")\n".
			"first name: ".$forward_first_name."\n".
			"last name: ".$forward_last_name."\n".
			"username: ".$forward_username;
		
		$bot->sendMessage($chat_id, $reply, markdown);	
		
	}elseif (strpos($text, "@")!==false) {
		
		$result = $bot->getChat($chat_id);
		
		$bot->sendMessage($chat_id, PrintArr(json_decode($result)));	
		
	}elseif ($text=='Настройки'){
		
		$bot->sendMessage($chat_id, PrintArr($InlineKeyboardMarkup));
		
	}elseif ($text=='Стоп'){
		
		$bot->sendMessage($chat_id, "Всего Вам доброго! До новых встречь!", null, $HideKeyboard);
			
			
	}else{
		
		_info();  	
		
	}	
       
}else {

    // если пришло что-то другое
    $bot->call('sendMessage', ['chat_id' => $chat_id, 'text' => "Чего это такое?"]);
}


?>