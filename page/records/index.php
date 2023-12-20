<?php global $conn, $schoolName, $mysqli;
$var = "records";
include '../../page/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="m-t-4em pad-2em">
    <div class="d-flex-center w-100p">
        <div id="content" class=" w-79-8p h-100p b-r-7px">
            <div class="m-2em  h-43em bg-white ">



                <?php
                $sql = "select * from residents_info order by id desc Limit 1 ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $lrn = isset($row['id']) ? $row['id'] + 1 : 0;
                $lrns1 = 'S' . str_pad($lrn, 7, "0", STR_PAD_LEFT);

                // Get the total number of records from our table "students".
                $total_pages = $mysqli->query("select * from residents_info order by id desc")->num_rows;
                // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                // Number of results to show on each page.
                $num_results_on_page = 10;

                if ($stmt = $mysqli->prepare("select * from residents_info order by id desc LIMIT ?,?")) {
                    // Calculate the page to get the results we need from our table.
                    $calc_page = ($page - 1) * $num_results_on_page;
                    $stmt->bind_param('ii', $calc_page, $num_results_on_page);
                    $stmt->execute();
                    // Get the results...
                    $result = $stmt->get_result();
                    ?>

                    <table class="table table-1 b-shadow-dark">
                        <thead>
                        <tr>
                            <th <label for="user-list-cb"
                                                              class="d-flex-center"></label><input
                                        id="user-list-cb" type="checkbox"
                                        onclick="checkCBStudents('user-list', 'user-list-cb')"
                                        class="sc-1-3 c-hand"/></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Birthday</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Home Address</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody id="user-list">
                        <?php
                        $i = 0;
                        while ($row = $result->fetch_assoc()):
                            $i++;
                            ?>
                            <tr>
                                <td class="d-flex-center"><label>
                                        <input type="checkbox" class="sc-1-3 c-hand check"
                                               id="<?= $row['userid'] ?>"/>
                                    </label></td>
                                <th scope="row"><?= $i ?> </th>
                                <td><?= $row['first_name'] ?> <?= $row['last_name'] ?> <?= $row['middle_name'] ?></td>
                                <td><?= $row['age'] ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['birthday'] ?></td>
                                <td><?= $row['contact_number'] ?></td>
                                <td><?= $row['email_address'] ?></td>
                                <td><?= $row['home_address'] ?></td>
                                <td>
                                    <label for="" class="t-color-red c-hand f-weight-bold"
                                           onclick="editUser('<?= $row['userid'] ?>','<?= $row['lname'] ?>','<?= $row['fname'] ?>','<?= $row['username'] ?>','<?= $row['password'] ?>', '<?= $row['address'] ?>', '<?= $row['email'] ?>' , '<?= $row['user_type'] ?>'   )">
                                        <svg width="40" height="40" viewBox="0 0 48 48"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <defs>
                                                <style>.cls-1 {
                                                        fill: url(#linear-gradient);
                                                    }

                                                    .cls-2 {
                                                        fill: url(#linear-gradient-2);
                                                    }

                                                    .cls-3 {
                                                        fill: url(#linear-gradient-3);
                                                    }

                                                    .cls-4 {
                                                        fill: #666;
                                                    }

                                                    .cls-5 {
                                                        fill: url(#linear-gradient-4);
                                                    }

                                                    .cls-6 {
                                                        fill: url(#linear-gradient-5);
                                                    }

                                                    .cls-7 {
                                                        fill: url(#linear-gradient-6);
                                                    }

                                                    .cls-8 {
                                                        fill: url(#linear-gradient-7);
                                                    }

                                                    .cls-9 {
                                                        fill: url(#linear-gradient-8);
                                                    }

                                                    .cls-10 {
                                                        fill: url(#linear-gradient-9);
                                                    }

                                                    .cls-11 {
                                                        fill: url(#linear-gradient-10);
                                                    }

                                                    .cls-12 {
                                                        fill: url(#linear-gradient-11);
                                                    }

                                                    .cls-13 {
                                                        fill: url(#linear-gradient-12);
                                                    }

                                                    .cls-14 {
                                                        fill: url(#linear-gradient-13);
                                                    }

                                                    .cls-15 {
                                                        fill: url(#linear-gradient-14);
                                                    }</style>
                                                <linearGradient gradientUnits="userSpaceOnUse"
                                                                id="linear-gradient"
                                                                x1="22.98" x2="26.48" y1="23.9" y2="28.27">
                                                    <stop offset="0.04" stop-color="#fbb480"/>
                                                    <stop offset="1" stop-color="#c27c4a"/>
                                                </linearGradient>
                                                <linearGradient id="linear-gradient-2" x1="7.85" x2="11.63"
                                                                xlink:href="#linear-gradient" y1="35.07"
                                                                y2="39.53"/>
                                                <linearGradient id="linear-gradient-3" x1="7.26" x2="12.14"
                                                                xlink:href="#linear-gradient" y1="33.38"
                                                                y2="38.26"/>
                                                <linearGradient id="linear-gradient-4" x1="35.06" x2="41.75"
                                                                xlink:href="#linear-gradient" y1="9.61"
                                                                y2="16.3"/>
                                                <linearGradient id="linear-gradient-5" x1="32.45" x2="41.29"
                                                                xlink:href="#linear-gradient" y1="6.23"
                                                                y2="17.91"/>
                                                <linearGradient
                                                        gradientTransform="translate(21.95 -5.88) rotate(44.99)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-6"
                                                        x1="17.07" x2="22.48" y1="22.56" y2="27.98">
                                                    <stop offset="0.01" stop-color="#ffdc2e"/>
                                                    <stop offset="1" stop-color="#f79139"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(28.21 -8.47) rotate(45)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-7"
                                                        x1="22.57" x2="26.35" y1="28.06" y2="31.84">
                                                    <stop offset="0.01" stop-color="#f46000"/>
                                                    <stop offset="1" stop-color="#de722c"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(25.08 -7.17) rotate(45)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-8"
                                                        x1="20.21" x2="24.85" y1="25.7" y2="30.35">
                                                    <stop offset="0.01" stop-color="#f99d46"/>
                                                    <stop offset="1" stop-color="#f46000"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(23.66 -19.41) rotate(44.98)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-9"
                                                        x1="34.09"
                                                        x2="36.35" y1="17.69" y2="19.95">
                                                    <stop offset="0.01" stop-color="#a1a1a1"/>
                                                    <stop offset="1" stop-color="#828282"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(17.4 -16.81) rotate(44.98)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-10"
                                                        x1="27.79" x2="30.61" y1="11.39" y2="14.22">
                                                    <stop offset="0.01" stop-color="#fafafa"/>
                                                    <stop offset="1" stop-color="#dedede"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(20.55 -18.12) rotate(45)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-11"
                                                        x1="30.43" x2="34.61" y1="14.03" y2="18.21">
                                                    <stop offset="0.01" stop-color="#d4d4d4"/>
                                                    <stop offset="1" stop-color="#a6a6a6"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(23.67 -19.41) rotate(44.99)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-12"
                                                        x1="33.9"
                                                        x2="36.13" y1="17.5" y2="19.73">
                                                    <stop offset="0.01" stop-color="#b2b2b2"/>
                                                    <stop offset="1" stop-color="#939393"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(17.41 -16.82) rotate(44.99)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-13"
                                                        x1="28.07" x2="30.21" y1="11.67" y2="13.81">
                                                    <stop offset="0.01" stop-color="#fafafa"/>
                                                    <stop offset="1" stop-color="#efefef"/>
                                                </linearGradient>
                                                <linearGradient
                                                        gradientTransform="translate(20.55 -18.12) rotate(45)"
                                                        gradientUnits="userSpaceOnUse" id="linear-gradient-14"
                                                        x1="30.39" x2="34.73" y1="14" y2="18.34">
                                                    <stop offset="0.01" stop-color="#e5e5e5"/>
                                                    <stop offset="1" stop-color="#b7b7b7"/>
                                                </linearGradient>
                                            </defs>
                                            <title/>
                                            <g id="icons">
                                                <g data-name="Layer 3" id="Layer_3">
                                                    <path class="cls-1"
                                                          d="M41.43,11.27,36.61,6.46a2.8,2.8,0,0,0-4,0L8,31.06,6.27,38.73l3.06,3.06,7.49-1.94,24.61-24.6A2.83,2.83,0,0,0,41.43,11.27Z"/>
                                                    <polygon class="cls-2"
                                                             points="7.24 39.7 10.56 33.59 14.29 37.32 8.19 40.65 7.24 39.7"/>
                                                    <polygon class="cls-3"
                                                             points="9.33 41.78 16.82 39.85 18.45 38.23 14.29 37.32 8.19 40.65 9.33 41.78"/>
                                                    <path class="cls-4"
                                                          d="M7.33,42.3l2-.51L6.27,38.73s-.21.91-.46,2S6.23,42.58,7.33,42.3Z"/>
                                                    <path class="cls-5"
                                                          d="M41.43,11.27,36.61,6.46a2.8,2.8,0,0,0-4,0L29.92,9.17l2.53,2.53,3.73,3.73L38.71,18l2.72-2.71A2.83,2.83,0,0,0,41.43,11.27Z"/>
                                                    <path class="cls-6"
                                                          d="M41.46,11.87,37.62,8a2.25,2.25,0,0,0-3.17,0l-3.07,3.08,2,2,3,3,2,2L41.46,15A2.24,2.24,0,0,0,41.46,11.87Z"/>
                                                    <rect class="cls-7" height="3.58"
                                                          transform="translate(-11.37 19.67) rotate(-44.99)"
                                                          width="24.8" x="5.67" y="21.77"/>
                                                    <rect class="cls-8" height="3.58"
                                                          transform="translate(-13.96 25.93) rotate(-45)"
                                                          width="24.8"
                                                          x="11.92" y="28.03"/>
                                                    <rect class="cls-9" height="5.27"
                                                          transform="translate(-12.66 22.8) rotate(-45)"
                                                          width="24.8"
                                                          x="8.79" y="24.05"/>
                                                    <rect class="cls-10" height="3.58"
                                                          transform="translate(-3.02 30.45) rotate(-44.98)"
                                                          width="7.63"
                                                          x="31.46" y="17.08"/>
                                                    <rect class="cls-11" height="3.58"
                                                          transform="translate(-0.43 24.2) rotate(-44.98)"
                                                          width="7.62"
                                                          x="25.2" y="10.83"/>
                                                    <rect class="cls-12" height="5.27"
                                                          transform="translate(-1.72 27.34) rotate(-45)"
                                                          width="7.62"
                                                          x="28.33" y="13.11"/>
                                                    <rect class="cls-13" height="3.58"
                                                          transform="translate(-3.02 30.46) rotate(-44.99)"
                                                          width="6.15"
                                                          x="32.19" y="17.08"/>
                                                    <rect class="cls-14" height="3.58"
                                                          transform="translate(-0.43 24.2) rotate(-44.99)"
                                                          width="6.15"
                                                          x="25.94" y="10.83"/>
                                                    <rect class="cls-15" height="5.27"
                                                          transform="translate(-1.72 27.34) rotate(-45)"
                                                          width="6.15"
                                                          x="29.06" y="13.11"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </label>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>

                    <?php
                    $stmt->close();
                }
                ?>
                Total Records: <?= $total_pages ?>
                <div class="m-2em d-flex-end m-t-n1em">
                    <div class="d-flex-center">
                        <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
                            <ul class="pagination">
                                <?php if ($page > 1): ?>
                                    <li class="prev"><a
                                                href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?>&&page=<?php echo $page - 1 ?>">Prev</a>
                                    </li>
                                <?php endif; ?>

                                <?php if ($page > 3): ?>
                                    <li class="start"><a
                                                href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo $page + 1 ?>">1</a>
                                    </li>
                                    <li class="dots">...</li>
                                <?php endif; ?>

                                <?php if ($page - 2 > 0): ?>
                                    <li class="page"><a
                                            href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a>
                                    </li><?php endif; ?>
                                <?php if ($page - 1 > 0): ?>
                                    <li class="page"><a
                                            href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a>
                                    </li><?php endif; ?>

                                <li class="currentpage"><a
                                            href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo $page ?>"><?php echo $page ?></a>
                                </li>

                                <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1): ?>
                                    <li class="page"><a
                                            href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a>
                                    </li><?php endif; ?>
                                <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1): ?>
                                    <li class="page"><a
                                            href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a>
                                    </li><?php endif; ?>

                                <?php if ($page < ceil($total_pages / $num_results_on_page) - 2): ?>
                                    <li class="dots">...</li>
                                    <li class="end"><a
                                                href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                                    <li class="next"><a
                                                href="/1-php-grading-system/admins_page/add_new_user/?id=<?php echo $_GET['id'] ?><?php if (isset($_GET['searchName'])): ?>&&searchName=<?php echo $_GET['searchName'] ?><?php endif; ?>&&page=<?php echo $page + 1 ?>">Next</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script>


</script>
    <link href="https://cdn.jsdelivr.net/gh/xxjapp/xdialog@3/xdialog.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/gh/xxjapp/xdialog@3/xdialog.min.js"></script>
</div>
</body>

