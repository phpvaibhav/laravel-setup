<!DOCTYPE html>
<html>
	<head>
	    <title>Mail</title>
	</head>
	<body style="font-family: 'Source Sans Pro', sans-serif; padding:0; margin:0;">
	    <table style="max-width: 750px; margin: 0px auto; width: 100% ! important; background: #F3F3F3; padding:30px 30px 30px 30px;" width="100% !important" border="0" cellpadding="0" cellspacing="0">
	        <tr>
	            <td style="text-align: left; background: #fff;">
	                <table width="100%" border="0" cellpadding="30" cellspacing="0">
	                    <tr>
	                        <td>
	                            <img style="max-width: 125px; width: 100%;padding: 10px;"  src="{{ asset('backend_assets/img/avatar.png')}}" >
	                        </td>
	                    </tr>
	                </table>
	            </td>
	        </tr>
	        <tr>
	            <td style="text-align: center;">
	                <table width="100%" border="0" cellpadding="30" cellspacing="0" bgcolor="#fff">
	                    <tr>
	                        <td>
	                            <h3 style="color: #333; font-size: 28px; font-weight: normal; margin: 0; text-transform: capitalize;">{{ $title }}</h3>                          
	                        
	                           <p style="text-align: left;color: #333; font-size: 16px; line-height: 28px;">{{ $body }}</p>
	                        </td>
	                    </tr>
	                </table>
	            </td>
	        </tr>
	        <tr>
	            <td style="text-align: center;">
	                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#fff">
	                    <tr>
	                        <td style="padding: 10px;background:#2A2725;color: #fff;">Copyright &copy; <?php echo date('Y'); ?></td>
	                    </tr>
	                </table>
	            </td>
	        </tr>
	    </table>
	</body>
</html>