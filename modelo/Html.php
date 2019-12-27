<?php 

class html
{
	
	function __construct()
	{
		
	}

	function header()
	{

	echo '
	</head>
	<body>
	<div class="container-fluid">
	';

	}

	function footer()
	{
	
	echo '
    <br></br>
	<p class="text-center">'.date('Y').' - <a href="http://10.252.194.189/intranetbbva/" target="_blank" style="color:#FF7900">ATENTO</a></p>
	</div>
	</body>
	</html>';

	}
}


 ?>