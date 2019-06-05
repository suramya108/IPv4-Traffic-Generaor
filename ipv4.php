<html>
<body>
	<?php

	$sa="172.27.28.185";//$_POST['src_add'];
	$da="172.27.22.26";//$_POST['dest_add'];
	$p="udp";//$_POST['prot'];
	if($p == "udp" || $p=="tcp")
	{
	$sp="443";//$_POST['srcp'];
	$dp="80";//$_POST['dstp'];
	}
	$c="cont";//$_POST['cont'];
	if($c=="ncont")

		$number='20';//$_POST['number'];

	$plen="512";//$_POST['len'];
	$gap="2";//$_POST['gap'];
	$po="rand";//$_POST['select'];
	if($po=="own")
	{
		$popt='hello world';//$_POST['po'];
	}
	echo '<br>';
	echo $sa;
	echo $da;
	echo $p;
	echo $sp;
	echo $dp;
	echo $c;
	echo $plen;
	echo $gap;
	echo $po;//$number,$popt;
	echo '<br>';
	//$count=0;
//	$len=strlen($popt);
	if($p=="udp")
	{
		if($c=="cont")
		{
			if($po=="own")
			{
//				while(1)
//				{
				//	$data=substr($popt, $count,$plen);
				//	$count=$count+$plen;
				//	echo "<br>";
					echo 'sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -v $da';
					echo "<br>";
					system('sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -v $da');
				//	if($cont>$plen)
				//		{break;}
					sleep($gap);
//				}				
			}
				 if($po=="rand")
				{
					while (1) 
					{
						system('sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp '.$plen."-v $da");
						sleep($gap);
					}
				}						
		}
	}
			else if($c=="ncont")
			{
				if($po=="own")
				{
					for ($i=0; $i <$number ; $i++) 
					{ 
					//	$data=substr($popt, $count,$plen);
					//	$count=$count+$plen;
						system('sendip -p ipv4 -is $sa -p udp us $sp -ud $dp -v $da');
						if($count>$plen)
						{
							break;
						}
						sleep($gap);
					}
				}
				elseif ($po=="rand") 
				{
					for ($i=0; $i < $number; $i++) 
					{ 
		
						system('sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp  '.$plen.'-v $da');
					}
				}
			}
		
//			elseif ($p=="tcp") {
//				if ($c=="cont") {
//					if ($po=="own") {
//						while (1) {
//							# code...
//							$data=substr($popt,$count,$plen);
//							$count=$count+$plen;
//							system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d ".$data."-v $da");						if ($count>$plen) {
//								# code...
//								break;
//							}
//							sleep($gap);
//						}
//					}
//					elseif ($po=="rand") {
//						while (1) {
//							system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d r".$plen."-v $da");
//							sleep($gap);
//						}
//						}
//					}
//					elseif ($c=="ncont") {
//						if($po=="own") {
//							for ($i=0; $i <$number ; $i++) { 
//								$data=substr($popt,$count,$plen);
//								$count=$count+$plen;
//								system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d ".$data."-v $da");
//								if ($count>$plen) {
//								break;
//							}
//							sleep($gap);
//						}
//					}
//					elseif ($po=="rand") {
//						for ($i=0; $i < $number; $i++) { 
//							# code...
//						}
//							system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d r".$plen."-v $da");
//							sleep($gap);
//
//						}
//				}
//			}
//			}
//			elseif ($p=="icmp") {
//				if($c=="cont")
//				{
//					if($po=="own")
//					{
//						while (1) {
//							$data=substr($popt,$count,$plen);
//							$count=$count+$plen;
//							system("sendip -p ipv4 -is $sa -p icmp -d ".$data."-v $da");
//							if ($count>$len) {
//								break;
//							}
//							sleep($gap);
//						}
//					}
//					elseif ($po=="rand") {
//						while (1) {
//							system("sendip -p ipv4 -is $sa -p icmp -d r".$plen."-v $da");
//							sleep($gap);
//						}
//
//						}
//					}
//					elseif ($c=="ncont") {
//						if($po=="own") {
//							for ($i=0; $i <$number ; $i++) { 
//								$data=substr($popt,$count,$plen);
//								$count=$count+$plen;
//								system("sendip -p ipv4 -is $sa -p icmp -d ".$data."-v $da");
//								if ($c>$len) {
//								break;
//							}
//							sleep($gap);
//						}
//					}
//					elseif ($po=="rand") {
//						for ($i=0; $i < $number; $i++) { 
//							system("sendip -p ipv4 -is $sa -p icmp -d r".$plen."-v $da");
//							sleep($gap);
//						
//							}
//			}
//		}
//	}

?>
</body>
</html>

