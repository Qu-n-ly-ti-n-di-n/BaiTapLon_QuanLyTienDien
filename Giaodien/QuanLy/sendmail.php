<?php
									include '../../connect.php';
									$sql = "SELECT Email FROM khachhang";
									$result = mysqli_query($connect,$sql);
									if(mysqli_num_rows($result)>0)
									{
										while($row =mysqli_fetch_assoc($result))
										{
                                            $user=$row['Email'];
                                            $emai=$user . ",";
                                            
                                 
                                   
                                        }}
                                        $to      = "$emai";
                                        $subject = "Tiêu đề email";
                                        $message = "Nội dung email";
                                        $headers  =  "From:bomditimvk02@gmail.com" . "\r\n".
                                        "CC: somebodyelse@example.com";
                                    
                                        $success = mail ($to,$subject,$message,$headers);
                                    
                                        if( $success == true )
                                        {
                                            echo "Đã gửi mail thành công...";
                                        }
                                        else
                                        {
                                              echo "Không gửi đi được...";
                                        }
                                    
 
?>


        
    



                                        
											
									
								
											