{{
$time->gt(\Carbon\Carbon::now()->subDay())
? \Carbon\Carbon::parse($time)->locale('vi')->diffForHumans() 
: \Carbon\Carbon::parse($time)->locale('vi')->translatedFormat('H:i,l, d F, Y') 
}}