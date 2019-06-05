<html>
<body>
<?php
$sa=$_POST['src_add'];//"172.27.28.214";
$da=$_POST['dest_add'];//"172.27.30.115";
$p=$_POST['prot'];//"icmp";

if($p=="tcp"||$p=="udp")
{
	$sp=$_POST['srcp'];//"443";
	$dp=$_POST['dstp'];//"81";
}
$plen=$_POST['len'];//"512";
$gap=$_POST['gap'];//"2";
$po=$_POST['select'];//"own";
if($po=="own")
{
	$po1=$_POST['po'];//"hello world";
}
$c=$_POST['cont'];//"cont";
if($c=="ncont")
{
	$number=$_POST['number'];//"20";
}
echo $sa, $da, $p, $sp,$dp,$c,$plen,$gap,$po;
echo 
$count=0;
$len=strlen($po1);
if($p=="udp")
{
	if($c=="cont")
	{
		if($po=="own")
		{
		while(1)
		{
		$data=substr($po1,$count,$len);
		$count=$count+$len;
	//	echo
		echo " sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d'".$data."' -v $da";
	//	echo
		system(" sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d '".$data."' -v $da");
		if($count>$len)
		{break;}
		sleep($gap);
		}
		}
		else if($po=="rand")
		{
		while(1)
		{
		system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d ".$plen." -v $da");
		sleep($gap);
		}
		}
	}
	else if($c=="ncont")
	{
		if($p=="own")
		{
		for($i=0;$i<=$number;$i++)
                {
               	 	$data=substr($po1,$count,$len);
                	$count=$count+$len;

                system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d'".$data."' -v $da");
                if($count>$len)
                {break;}
                sleep($gap);
                }
                }
		else if($po=="rand")
		{
		for($i=0;$i<=$number;$i++)
		{
		system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d'".$plen."' -v $da");
		}
		}
	}
}
else if($p=="tcp")
{

        if($c=="cont")
        {
                if($po=="own")
                {
                while(1)
                {
		$data=substr($po1,$count,$len);
                $count=$count+$len;
        //      echo
 //               echo " sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d'".$data."' -v $da";
        //      echo
                system(" sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d '".$data."' -v $da");
                if($count>$len)
                {break;}
                sleep($gap);
                }
                }
                else if($po=="rand")
                {
                while(1)
                {
                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d ".$plen." -v $da");
                sleep($gap);
                }
                }
        }
	else if($c=="ncont")
        {
                if($p=="own")
                {
                for($i=0;$i<=$number;$i++)
                {
                        $data=substr($po1,$count,$len);
                        $count=$count+$len;

                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d'".$data."' -v $da");
                if($count>$len)
                {break;}
                sleep($gap);
                }
                }
                else if($po=="rand")
                {
                for($i=0;$i<=$number;$i++)
		{
                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d '".$plen."' -v $da");
		sleep($gap);
                }
                }
        }
}
else if($p=="icmp")
{
if($c=="cont")
{
if($po=="own")
{
while(1)
{
$data=substr($po1,$count,$len);
$count=$count+$len;

                system("sendip -p ipv4 -is $sa -p icmp -d'".$data."' -v $da");
                if($count>$len)
                {break;}
                sleep($gap);
                }
                }
                else if($po=="rand")
		{
		while(1)
		{
		system("sendip -p ipv4 -is $sa -p icmp -d'".$plen."' -v $da");
		sleep($gap);
                }
                }
}
else if($c=="ncont")
        {
                if($p=="own")
                {
                for($i=0;$i<=$number;$i++)
                {
                        $data=substr($po1,$count,$len);
                        $count=$count+$len;

                system("sendip -p ipv4 -is $sa -p -d'".$data."' -v $da");
                if($count>$len)
                {break;}
                sleep($gap);
                }
                }
                else if($po=="rand")
                {
                for($i=0;$i<=$number;$i++)
                {
                system("sendip -p ipv4 -is $sa -p -d '".$plen."' -v $da");
                sleep($gap);
                }
                }
        }
}


	
?>
</html>
</body>

