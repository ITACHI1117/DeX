<?php
  include "db_config.php";
  // Start session
session_start();

function showstuff(){
echo"<h1>hi</h1>";
};

// Check if the user is logged in, if not then redirect them to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.html");
    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Balance</title>
    <link rel="stylesheet" href="balance.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="row_container">
      <nav>
        <div class="logo">
          <h1>DeX.</h1>
        </div>
        <div>
          <div class="nav_links">
            <a href="dashboard.php">
              <div class="nav_link_container">
                <div class="nav_link_icon">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 18 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_489_77)">
                      <path
                        d="M6.67411 16.1765V13.6674C6.67409 13.0292 7.19439 12.5106 7.83903 12.5063H10.2004C10.8481 12.5063 11.3732 13.0262 11.3732 13.6674V16.1843C11.373 16.7262 11.8099 17.1691 12.3571 17.1818H13.9313C15.5006 17.1818 16.7727 15.9223 16.7727 14.3687V7.23089C16.7644 6.6197 16.4745 6.04576 15.9856 5.67241L10.6018 1.37882C9.65861 0.631215 8.31783 0.631215 7.37464 1.37882L2.01441 5.68021C1.52369 6.05204 1.23334 6.62693 1.22729 7.23868V14.3687C1.22729 15.9223 2.49947 17.1818 4.06877 17.1818H5.64299C6.20377 17.1818 6.65837 16.7317 6.65837 16.1765"
                        stroke="#3A4046"
                        stroke-width="1.09091"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_489_77">
                        <rect width="18" height="18" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </div>
                <p>Home</p>
              </div>
            </a>

            <a href="payments.php">
              <div class="nav_link_container">
                <div class="nav_link_icon">
                  <svg
                    width="18"
                    height="18"
                    viewBox="0 0 18 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M16 4.2501H15.75V2.0001C15.7474 1.53678 15.5622 1.09318 15.2345 0.765555C14.9069 0.437935 14.4633 0.252715 14 0.250095C13.9207 0.235645 13.8393 0.235645 13.76 0.250095L1.86 4.2501H1.75H1.59L1.42 4.3101H1.28L1.12 4.4001L1 4.5701L0.860003 4.6901L0.750003 4.7901L0.630004 4.9401C0.598004 4.9688 0.570973 5.00259 0.550003 5.0401C0.512883 5.09792 0.479483 5.15804 0.450003 5.2201L0.390004 5.3301C0.362164 5.40192 0.338783 5.47539 0.320003 5.5501C0.324503 5.58663 0.324503 5.62357 0.320003 5.6601C0.309673 5.7732 0.309673 5.887 0.320003 6.0001V16.0001C0.322103 16.4516 0.497653 16.885 0.810343 17.2107C1.12303 17.5365 1.54895 17.7296 2 17.7501H16C16.4633 17.7474 16.9069 17.5622 17.2345 17.2346C17.5622 16.907 17.7474 16.4634 17.75 16.0001V6.0001C17.7474 5.53678 17.5622 5.09318 17.2345 4.76556C16.9069 4.43794 16.4633 4.25272 16 4.2501ZM14.08 1.7601C14.1293 1.77827 14.1719 1.81091 14.2022 1.85375C14.2325 1.89659 14.2492 1.94761 14.25 2.0001V4.2501H6.62L14.08 1.7601ZM16.25 16.0001C16.25 16.0664 16.2237 16.13 16.1768 16.1768C16.1299 16.2237 16.0663 16.2501 16 16.2501H2C1.9337 16.2501 1.87011 16.2237 1.82322 16.1768C1.77634 16.13 1.75 16.0664 1.75 16.0001V6.0001C1.75 5.9338 1.77634 5.8702 1.82322 5.82332C1.87011 5.77644 1.9337 5.7501 2 5.7501H16C16.0663 5.7501 16.1299 5.77644 16.1768 5.82332C16.2237 5.8702 16.25 5.9338 16.25 6.0001V16.0001Z"
                      fill="#3A4046"
                      fill-opacity="0.8"
                    />
                    <path
                      d="M13.5 12.2502C14.1904 12.2502 14.75 11.6906 14.75 11.0002C14.75 10.3098 14.1904 9.75024 13.5 9.75024C12.8096 9.75024 12.25 10.3098 12.25 11.0002C12.25 11.6906 12.8096 12.2502 13.5 12.2502Z"
                      fill="#3A4046"
                      fill-opacity="0.8"
                    />
                  </svg>
                </div>
                <p>Payments</p>
              </div>
            </a>

            <a href="balance.php">
              <div class="nav_link_container" style="background-color: #ebf5ff">
                <div class="nav_link_icon">
                  <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M15.755 1H6.245C5.086 1 4.507 1 4.039 1.163C3.59778 1.31946 3.19856 1.5755 2.87234 1.91126C2.54612 2.24702 2.30168 2.65345 2.158 3.099C2 3.581 2 4.177 2 5.37V19.374C2 20.232 2.985 20.688 3.608 20.118C3.78279 19.9565 4.01202 19.8668 4.25 19.8668C4.48798 19.8668 4.71721 19.9565 4.892 20.118L5.375 20.56C5.68121 20.8432 6.08293 21.0004 6.5 21.0004C6.91707 21.0004 7.31879 20.8432 7.625 20.56C7.93121 20.2768 8.33293 20.1196 8.75 20.1196C9.16707 20.1196 9.56879 20.2768 9.875 20.56C10.1812 20.8432 10.5829 21.0004 11 21.0004C11.4171 21.0004 11.8188 20.8432 12.125 20.56C12.4312 20.2768 12.8329 20.1196 13.25 20.1196C13.6671 20.1196 14.0688 20.2768 14.375 20.56C14.6812 20.8432 15.0829 21.0004 15.5 21.0004C15.9171 21.0004 16.3188 20.8432 16.625 20.56L17.108 20.118C17.2828 19.9565 17.512 19.8668 17.75 19.8668C17.988 19.8668 18.2172 19.9565 18.392 20.118C19.015 20.688 20 20.232 20 19.374V5.37C20 4.177 20 3.58 19.842 3.1C19.6985 2.65423 19.4542 2.24757 19.1279 1.91162C18.8017 1.57567 18.4024 1.31949 17.961 1.163C17.493 1 16.914 1 15.755 1Z"
                      stroke="#0074D9"
                      stroke-opacity="0.8"
                      stroke-width="1.5"
                    />
                    <path
                      d="M9.5 10H16M6 10H6.5M6 6.5H6.5M6 13.5H6.5M9.5 6.5H16M9.5 13.5H16"
                      stroke="#0074D9"
                      stroke-opacity="0.8"
                      stroke-width="1.5"
                      stroke-linecap="round"
                    />
                  </svg>
                </div>
                <p style="color: #0074d9">Balance</p>
              </div>
            </a>

            <a href="inbox.php">
              <div class="nav_link_container">
                <div class="nav_link_icon">
                  <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_489_95)">
                      <path
                        d="M15.382 3C15.7259 3.00013 16.0639 3.08891 16.3634 3.25777C16.6629 3.42664 16.9139 3.66987 17.092 3.964L17.171 4.106L20.683 11.131C20.8563 11.4773 20.9609 11.8539 20.991 12.24L21 12.472V18C21.0002 18.5046 20.8096 18.9906 20.4665 19.3605C20.1234 19.7305 19.6532 19.9572 19.15 19.995L19 20H3C2.49542 20.0002 2.00943 19.8096 1.63945 19.4665C1.26947 19.1234 1.04284 18.6532 1.005 18.15L1 18V12.472C0.999698 12.0847 1.07441 11.7009 1.22 11.342L1.317 11.13L4.829 4.106C4.98277 3.79806 5.21341 3.53501 5.49861 3.3423C5.78381 3.1496 6.11392 3.03376 6.457 3.006L6.618 3H15.382ZM7 13H3V18H19V13H15V13.5C15 13.8978 14.842 14.2794 14.5607 14.5607C14.2794 14.842 13.8978 15 13.5 15H8.5C8.10218 15 7.72064 14.842 7.43934 14.5607C7.15804 14.2794 7 13.8978 7 13.5V13ZM15.382 5H6.618L3.618 11H7.5C7.87288 11 8.23239 11.1389 8.50842 11.3896C8.78445 11.6403 8.9572 11.9848 8.993 12.356L9 12.5V13H13V12.5C13 12.1271 13.1389 11.7676 13.3896 11.4916C13.6403 11.2156 13.9848 11.0428 14.356 11.007L14.5 11H18.382L15.382 5Z"
                        fill="#3A4046"
                        fill-opacity="0.8"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_489_95">
                        <rect width="22" height="22" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </div>
                <p>Inbox</p>
              </div>
            </a>
          </div>
        </div>
        <!-- <div class="side_line"><p></p></div> -->
      </nav>

      <!-- top bar -->
      <section class="right_content">
        <div class="top_bar">
          <div class="top_bar_item">
            <h2>Dashboard</h2>
            <div class="profile_container">
              <svg
                width="25"
                height="25"
                viewBox="0 0 22 22"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M10.9617 10.8921H10.9927C13.8247 10.8921 16.1287 8.58814 16.1287 5.75614C16.1287 2.92414 13.8247 0.619141 10.9927 0.619141C8.15975 0.619141 5.85575 2.92414 5.85575 5.75314C5.85075 7.12214 6.37975 8.41014 7.34375 9.38112C8.30675 10.3511 9.5917 10.8881 10.9617 10.8921ZM7.35575 5.75614C7.35575 3.75114 8.98775 2.11914 10.9927 2.11914C12.9977 2.11914 14.6287 3.75114 14.6287 5.75614C14.6287 7.76114 12.9977 9.39212 10.9927 9.39212H10.9647C9.9967 9.39012 9.0897 9.01012 8.40775 8.32314C7.72575 7.63714 7.35275 6.72614 7.35575 5.75614Z"
                  fill="#3A4046"
                  fill-opacity="0.8"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M3.40552 17.7561C3.40552 21.3811 9.1215 21.3811 10.9995 21.3811C12.8775 21.3811 18.5945 21.3811 18.5945 17.7341C18.5945 14.9411 15.1165 12.5811 10.9995 12.5811C6.88352 12.5811 3.40552 14.9511 3.40552 17.7561ZM4.90552 17.7561C4.90552 16.0211 7.51152 14.0811 10.9995 14.0811C14.4885 14.0811 17.0945 16.0101 17.0945 17.7341C17.0945 19.1581 15.0435 19.8811 10.9995 19.8811C6.95652 19.8811 4.90552 19.1661 4.90552 17.7561Z"
                  fill="#3A4046"
                  fill-opacity="0.8"
                />
              </svg>
              <?php 
              $Logged_in_user = $_SESSION['fullname'];
              echo "<p>$Logged_in_user</p>";
              ?>
            </div>
          </div>
        </div>

        <section class="control_panel">
          <div class="table_container">
            <table>
              <tr>
                <th>Duration</th>
                <th>Total Amount to be paid</th>
                <th>Amount Per Month</th>
                <th>Amount paid(+ Down Payment)</th>
                <th>Amount Remaining</th>
              </tr>
              <?php 
                // SQL query to fetch user information
                $Logged_in_userID = $_SESSION['id'];
            $sql = "SELECT *  FROM balance WHERE id = '$Logged_in_userID'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
              $total_amount_to_be_paid = number_format($row['total_amount_to_be_paid']);
              $amount_per_month = number_format($row['amount_per_month']);
              $ap_plus_dp = number_format($row['ap_plus_dp']);
              $amount_remaining = number_format($row['amount_remaining']);

              if($row['amount_remaining'] == "0"){
                $amount_remaining = "<td>Completed Payment</td>";
                
              }else{
                $amount_remaining = "<td>$amount_remaining</td>";
              }
              echo "<tr>
                <td>".$row['duration']." Month</td>
                <td>$total_amount_to_be_paid</td>
                <td>$amount_per_month</td>
                <td>$ap_plus_dp</td>
                $amount_remaining
                
              </tr>";
            }

              ?>  
              
            </table>
          </div>
        </section>
      </section>
    </section>
    <!-- side nav -->
  </body>
</html>
