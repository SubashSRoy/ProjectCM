<?php
	
/*

*	INCLUDE File:          coDropDown.php
*	By:							TMIT
*	Date:		
*
*	code to render a dropDown for companies
*		and send the companyID to the script $postFormName
*		as a POSTed variable.
*
*
*=====================================
*/
				
		$tCompany_SQLselect = "SELECT  ";
		$tCompany_SQLselect .= "ID, preName, Name ";	
		$tCompany_SQLselect .= "FROM ";
		$tCompany_SQLselect .= "tCompany ";
		$tCompany_SQLselect .= "Order By Name ";
			
		$tCompany_SQLselect_Query = mysqli_query($dbConnected,$tCompany_SQLselect);	
		
		echo '<form action="'.$postFormName.'" method="post">';
		
		echo '<select name="companyID">';
		
			echo '<option value="0" label="coyvalue" selected="selected">..select company..</option>';
	 	
				while ($row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC)) {
				    $ID = $row['ID'];
				    $preName = $row['preName'];
				    $companyName = $row['Name'];
				    $RegType = $row['RegType'];
				    
				    $fullCoyName = trim($preName." ".$companyName." ".$RegType);
				    
				    echo '<option value="'.$ID.'">'.$fullCoyName.'</option>';
				}
			
				mysqli_free_result($tCompany_SQLselect_Query);		
		
				echo '</select>';
		
				echo '<input type="submit" />';
				
		echo '</form>';
		//	END:  Select company from dropdowm

?>