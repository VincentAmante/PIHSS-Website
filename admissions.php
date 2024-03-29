<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admissions - Pakistan Islamia Higher Secondary School</title>

  <link rel="stylesheet" href="./assets/css/global.css" />
  <link rel="stylesheet" href="./assets/css/admissions.css" />
  <link rel="shortcut icon" href="./assets/images/global/logo_small.png" type="image/x-icon" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- Header -->
  <?php include('./assets/php/header.php') ?>
  <?php 
    if (isset($_GET['error'])):?>
      <script>
          Swal.fire({
            title: "Registration failed!",
            text: "Something went wrong, please try again!",
            icon: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
          })
      </script>
    <?php elseif (isset($_GET['success'])):?>
      <script>
          Swal.fire({
            title: "Registration successful!",
            text: "The school has received your form",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
          })
      </script>
      <?php endif; ?>
  <main>
    <!-- Banner -->
    <section id="admissions-banner" class="subpage-banner">
      <div class="banner-container">
        <h1>Admissions</h1>
      </div>
    </section>

    <!-- Navigation Breadcrumbs -->
    <div id="nav-breadcrumbs" class="nav-breadcrumbs">
      <ul>
        <li><a href="./index.php">HOME</a></li>
        <li><a href="javascript:window.location.reload(true)">ADMISSIONS</a></li>
      </ul>
    </div>

    <!-- Admissions -->
    <section id="admissions" class="admissions">
      <div class="admissions-container">

        <!-- Overview -->
        <div class="admissions-overview">
          <div class="content">
            <div class="h1-border">
              <span></span>
              <h1>Admissions Overview</h1>
            </div>
            <p>
              We understand that choosing the right school for your child is a
              huge decision, so our admissions process is simple,
              straightforward and designed to give assurance to you and your
              child that PIHSS is the right choice for your family.
            </p>
            <p><strong>NOTE:</strong></p>

            <ul class="note">
              <li>
                Parents seeking admission for their children should contact
                the school during Jan-Feb.
              </li>
              <li>
                Admission depends on the availability of seats. Applicants are
                contacted only if seats are available.
              </li>
              <li>
                Parents should bring all the required documents on the day of
                interview/assessment test.
              </li>
              <li>
                Parents have to submit the due fees along with any pending
                documents within 3 days.
              </li>
            </ul> <!-- .note -->
          </div> <!-- .content -->

          <!-- Internal Navigation -->
          <div class="internal-nav">
            <div>
              <h2>Admissions</h2>
              <ul>
                <li><a href="#requirements">Requirements</a></li>
                <li><a href="#fee-structure">Fee Structure</a></li>
                <li><a href="#student-code">Student Code of Behavior</a></li>
                <li><a href="#registration">Registration</a></li>
              </ul>
            </div>
          </div> <!-- .internal-nav -->
        </div> <!-- .admissions-overview -->

        <!-- Admissions Process -->
        <div class="admissions-process">
          <h2>Admissions Process</h2>
          <ul>
            <li>
              <span class="card-number">1</span>
              <div class="card-content">
                <p>KG1 admission: Assessment Interviews</p>
                <p>
                  KG2 - Grade 10 admission: Entrance tests in English,
                  Mathematics & Science
                </p>
              </div>
            </li>

            <li>
              <span class="card-number">2</span>
              <div class="card-content">
                <p>Answer papers will NOT be shown to parents</p>
              </div>
            </li>

            <li>
              <span class="card-number">3</span>
              <div class="card-content">
                <p>
                  Parents will be notified by admin office via SMS/phone
                  call/website for the test date
                </p>
              </div>
            </li>

            <li>
              <span class="card-number">4</span>
              <div class="card-content">
                <p>
                  Successful applicants will be notified by the Admin office
                  via SMS/phone call/website and pasted on the school’s notice
                  board
                </p>
              </div>
            </li>
          </ul>
        </div> <!-- .admissions-process -->

        <!-- Admissions Requirements -->
        <div id="requirements" class="admissions-requirements">
          <h1>Requirements</h1>
          <h2>Documents Required</h2>

          <!-- List of Required Documents -->
          <ol class="documents-list">
            <li>
              <h3>LOCAL TRANSFER</h3>

              <ul class="local-transfer-list">
                <li>Passport Copy with valid visa of the student (2 copies)</li>
                <li>Original U.A.E. Identity Card of the student</li>
                <li>Copy of U.A.E. Identity Card of the student (2 copies)</li>
                <li>4 (Four photographs) with white background</li>
                <li>Medical File from previous school & Vaccination Card</li>
                <li>Passport copy with valid visa of the father (1 copy)</li>
                <li>Copy of U.A.E. identity card of the father (1 copy)</li>
                <li>Result Card from previous School duly attested by the Principal</li>
                <li>Transfer Certificate if issued (Locally) attested from concerned Educational Zone in UAE</li>
              </ul>
            </li>

            <li>
              <h3>TRANSFER FROM OTHER COUNTRIES</h3>

              <ul class="international-transfer-list">
                <li>Passport Copy with valid visa of the student (2 copies)</li>
                <li>Original U.A.E. Identity Card of the student</li>
                <li>Copy of U.A.E. Identity Card of the student (2 copies)</li>
                <li>4 (Four photographs) with white background</li>
                <li>Copy of Vaccination Card</li>
                <li>Passport copy with valid visa of the father (1 copy)</li>
                <li>Copy of U.A.E. identity card of the father (1 copy)</li>
                <li>Result Card from previous School duly attested by the Principal</li>
                <li>
                  School Leaving Certificate/Transfer Certificate (if issued) from Pakistan attested from:

                  <ol class="certificate-list">
                    <li>District Education Office</li>
                    <li>Ministry of Foreign Affairs from Pakistan</li>
                    <li>U.A.E. Embassy from Pakistan</li>
                  </ol>
                </li>
                <li>Migration Certificate of the Board (other than FBISE, Islamabad) is required if a student is joining
                  Class 9 after September or Class 10 during any month.</li>
                <li>Students seeking admissions in class XI must bring their Registration number or copy of the letter
                  sent to the Board for Registration purpose in case he/she passed his/her SSC Examination from the
                  Federal Board of Intermediate and Secondary education, Islamabad. Students passing their SSC
                  Examination from other than Federal Board Islamabad must provide the Migration Certificate. Students
                  passing from any other system are however exempted from providing the Migration Certificate.
                </li>
                <li>The admission of the students from 'O' level and Indian or any other will be finalized after the
                  issuance of Equivalence Certificate from Inter Board Committee of Chairman, Government of Pakistan,
                  Ministry of Education and approval from the Federal Board, Islamabad.
                </li>
                <li>“O” level student visit the website of ministry of education for equivalence certificate due to
                  change of Curriculum of Class: 11th admission.
                  <br>
                  <a href="www.inoe.gov.ae/En/EServices/ServiceCard/pages/CertEquivalentMove.aspx">www.inoe.gov.ae/En/EServices/ServiceCard/pages/CertEquivalentMove.aspx</a>
                </li>
              </ul>
            </li>
          </ol> <!-- .documents-list -->
        </div> <!-- #requirements -->
      </div> <!-- .admissions-container -->
    </section> <!-- #admissions -->

    <!-- Fee Structure -->
    <section id="fee-structure" class="fee-structure">
      <h1>Fee Structure</h1>
      <p>
        Fee is applicable for 10 months i.e. from April to March (Excluding
        July & August). In case if a student joins during the session, fee
        will be applicable from start of the academic year i.e. from April.
      </p>

      <!-- Fees Table -->
      <div id="fees-table" class="table-wrapper">
        <table>
          <tr>
            <th scope="col">S. No.</th>
            <th scope="col">Grade</th>
            <th scope="col">Fee / Annum</th>
          </tr>

          <tr>
            <td>1</td>
            <td>KG 1 - Grade 3</td>
            <td>AED 4,500</td>
          </tr>

          <tr>
            <td>2</td>
            <td>Grade 4 - Grade 5</td>
            <td>AED 4,700</td>
          </tr>

          <tr>
            <td>3</td>
            <td>Grade 6 - Grade 8</td>
            <td>AED 5,200</td>
          </tr>

          <tr>
            <td>4</td>
            <td>Grade 9</td>
            <td>AED 5,800</td>
          </tr>

          <tr>
            <td>5</td>
            <td>Grade 10</td>
            <td>AED 6,000</td>
          </tr>

          <tr>
            <td>6</td>
            <td>Grade 11 - Grade 12</td>
            <td>AED 8,000</td>
          </tr>
        </table>
      </div> <!-- #fees-table -->

      <div class="fees-note">
        <h3>Note:</h3>
        <ul>
          <li>
            The tuition fees are subject to change post approval from the Sharjah Private Education Authority (SPEA).
            The school may charge any additional fee as per instructions of SPEA/MOE/FBISE.
          </li>
          <li>
            The rates of the fee are subject to enhancement any time after it is duly approved by the SPEA UAE. School
            fee may be paid by quarterly / half yearly basis in advance. Fee should be paid on or before 10th of every
            month.
          </li>
          <li>
            In case of non-payment of dues, the name of the student may be forwarded to the SPEA for cancellation of
            admission according to the rules.
          </li>
          <li>
            Fee paid at the time of admission is non-refundable if the student fails to join the School.
          </li>
        </ul>
      </div> <!-- .fees-note -->

      <div class="sibling-concession">
        <h2>BROTHER / SISTER CONCESSION</h2>

        <ul>
          <li>Dhs.20/= from KG 1 to Class 5 Applicable from 3rd child onwards.</li>
          <li>Dhs.30/= from Class VI to Class: X Applicable from 3rd child onwards.</li>
          <li>Dhs.60/= for XI & XII Applicable from 2nd child onwards if both are studying in college section.</li>
        </ul>
      </div> <!-- .sibling-concession -->

      <div class="school-transport">
        <h2>SCHOOL TRANSPORT</h2>
        <p>
          The School has its own fleet of air-conditioned buses to provide safe and secure transportation for both
          sections.
        </p>
        <p>The transportation charges are as follows:</p>

        <ul>
          <li>Ajman: Dhs. 270/- per month</li>
          <li>Sharjah: Dhs. 250/- per month </li>
        </ul>

        <p>The bus charges are subject to change with approval from the Ministry of Education.</p>

        <div class="transport-note">
          <h3>Note:</h3>
          <ul>
            <li>
              Parents are to escort the students to and from the bus stop.
            </li>
            <li>
              Parents should preferably choose a bus stop where a group of students are available.
            </li>
            <li>
              Parents having any complaint against the school transport can either contact the Vice Principal /
              Transport Coordinator in person or through correspondence.
            </li>
            <li>
              The students will be picked from the fixed and nearest bus stops on the main roads. However, buses will
              not be allowed to go into the lanes.
            </li>
            <li>
              The students will not be permitted to avail school transport services under the following circumstances:

              <ol>
                <li>Persistent misbehavior with staff or students in the bus.</li>
                <li>Being habitually late in getting to the bus stop.</li>
                <li>Intentionally damaging the school bus and other fixtures.</li>
                <li>Activities that may endanger the life of students in the bus.</li>
              </ol>
            </li>
          </ul>
        </div> <!-- .transport-note -->
      </div> <!-- .school-transport -->
    </section>

    <!-- Student Code of Behavior -->
    <section id="student-code" class="student-code">
      <div class="student-code-container">
        <div class="student-code-content">
          <h1>Student Code of Behavior</h1>
          <p>
            It is important for parents and students to understand and abide by
            the school rules and regulations in order to maintain the school
            discipline. Our emphasis is upon rewarding positive behaviour. Parents and students are advised to carefully
            read and understand the
            following rules. Violation of these rules is likely to result in
            unpleasant consequences after consultation with the Ministry of
            Education.
          </p>

          <ol class="student-code-list">
            <li>
              Failing to satisfy the requirements of local Ministry of Education /
              Federal Board of Intermediate and Secondary Education, Islamabad.
            </li>
            <li>Any act involving moral turpitude.</li>
            <li>
              Cheating / Stealing or making false statements or accusations.
            </li>
            <li>Willfully and deliberately damaging the school property.</li>
            <li>Rudeness to any member of the staff.</li>
            <li>Smoking.</li>
            <li>Irregular attendance in classes or unpunctuality.</li>
            <li>
              Parents should promptly report and explain absences and tardiness to
              the Vice Principal.
            </li>
            <li>Unclean and shabby appearances.</li>
            <li>Failure to pay the fee within the extended time limit.</li>
            <li>
              Bringing fire arms / knives or any other lethal weapon to the
              school.
            </li>
            <li>
              Bringing cosmetics / ornaments / toys which can cause disturbance.
            </li>
            <li>Mobile phones / electronic gadgets.</li>
            <li>
              Home work assigned must be completed in time and signed by the
              respective teachers.
            </li>
            <li>
              Lost or damaged library books and materials should be replaced
            </li>
          </ol> <!-- .student-code-list -->
        </div> <!-- .student-code-content -->

        <div class="student-code-note">
          <h3>Note:</h3>

          <ul>
            <li>
              Offences under sub para 1, 2, 3, 4, 5 will be dealt with as per
              rules of Ministry of Education without reference to the parents.
            </li>
            <li>
              Any offence by a student against another student will be dealt with
              severity.
            </li>
            <li>
              Non compliance of the above stated student code of behaviour shall
              be stipulated for one week’s suspension as per Ministry of Education
              rules.
            </li>
            <li>
              Rustication shall always mean the loss of one academic year. The
              period of absence from the institution will, however, depend upon
              the time of the year when the penalty is imposed. The student may at
              the discretion of the Principal be permitted to rejoin the class in
              the same institute at the beginning of the next academic year.
            </li>
            <li>
              A student expelled from the institute shall not be re-admitted.
            </li>
          </ul>
        </div> <!-- .student-code-note -->

        <div class="leave-procedure">
          <h2>LEAVE PROCEDURE</h2>
          <ol>
            <li>Any application for more than 3 days on account of sickness is to be accompanied by a Medical
              Certificate.</li>
            <li>The name of the student will be struck off in case of continuous absence for 15 days without intimation.
              A leave application for more than three days leave will be sanctioned by the Vice Principal/Principal.
            </li>
          </ol>
        </div> <!-- .leave-procedure -->
      </div> <!-- .student-code-container -->
    </section> <!-- #student-code -->

    <!-- Registration -->
    <section id="registration" class="registration">
      <h1>Registration</h1>
      <h2>Student Registration Form</h2>

      <form class="registration-form" id="registration-form" action="./admin/assets/functions/submit-registration.php" method="POST" enctype="multipart/form-data" novalidate>
        <table>

          <!-- Student Name -->
          <tr class="form-row">
            <td class="form-label">
              <label for="student-name">Student name</label>
            </td>

            <td class="form-input">
              <div class="main-body">
                <input type="text" id="student-name" name="student-name" spellcheck="false" autocomplete="off" required>

                <!-- Displays status of validation -->
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>

              </div> <!-- .main-body -->

              <!-- Displays any errors from form validation -->
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Student Gender -->
          <tr class="form-row">
            <td class="form-label">
              <label for="gender">Gender</label>
            </td>
            <td class="form-input">
              <div class="radio-group main-body">

                <!-- Female -->
                <div class="input-group">
                  <input id="gender-female" type="radio" name="student-gender" value="f" required>
                  Female
                </div>

                <!-- Male  -->
                <div class="input-group">
                  <input id="gender-male" type="radio" name="student-gender" value="m" required>
                  Male
                </div>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
                <small>Error Message</small>
            </td>
          </tr>

          <!-- Date of Birth -->
          <tr class="form-row">
            <td class="form-label"><label for="date-of-birth">Date of Birth</label></td>
            <td class="form-input">
              <div class="main-body">
                <input type="date" name="date-of-birth" id="date-of-birth" required>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Emirates ID Number -->
          <tr class="form-row">
            <td class="form-label">
              <label for="eid-number">Emirates ID Number</label>
            </td>
            <td class="form-input">
              <div class="main-body">
                <input type="text" id="eid-number" name="eid-number" required autocomplete="off" minlength="15">
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Emirates Issue Date -->
          <tr class="form-row">
            <td class="form-label">
              <label for="eid-issue">EID Issue Date</label>
            </td>
            <td class="form-input">
              <div class="main-body">
                <input type="date" id="eid-issue" name="eid-issue" required>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Emirates Expiry Date -->
          <tr class="form-row">
            <td class="form-label">
              <label for="eid-expiry">EID Expiry Date</label>
            </td>
            <td class="form-input">
              <div class="main-body">
                <input type="date" id="eid-expiry" name="eid-expiry" required>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Emirates ID Image - Front -->
          <tr class="form-row">
            <td class="form-label">
              <label for="eid-copy-front">Upload EID - Frontview</label>
            </td>

            <td class="form-input">
              <label class="file-upload">
                <div class="upload-button">Add File</div>

                <!-- Drag and drop images -->
                <label class="uploader-single" ondragover="return false">
                  <i class="icon-upload icon"></i>
                  <img src="" class="" id="">
                  <input type="file" accept="image/*" name="eid-copy-front" id="eid-copy-front" required>
                </label>
                <small>Error Message</small>
              </label>
            </td>
          </tr>

          <!-- Emirates ID Image - Back -->
          <tr class="form-row">
            <td class="form-label">
              <label for="eid-copy-back">Upload EID - Backview</label>
            </td>
            <td class="form-input">
              <label class="file-upload">
                <div class="upload-button">Add File</div>
                <label class="uploader-single" ondragover="return false">
                  <i class="icon-upload icon"></i>
                  <img src="" class="" id="">
                  <input type="file" accept="image/*" name="eid-copy-back" id="eid-copy-back" required>
                </label>
                <small>Error Message</small>
              </label>
            </td>
          </tr>

          <!-- Passport Copy -->
          <tr class="form-row">
            <td class="form-label">
              <label for="passport-copy">Passport Copy</label>
            </td>
            <td class="form-input">
              <label class="file-upload">
                <div class="upload-button">Add File</div>
                <label class="uploader-single" ondragover="return false">
                  <i class="icon-upload icon"></i>
                  <img src="" class="" id="">
                  <input type="file" accept="image/*" name="passport-copy" id="passport-copy" required>
                </label>
                <small>Error Message</small>
            </td>
          </tr>

          <!-- Student Class -->
          <tr class="form-row">
            <td class="form-label">
              <label for="student-class">Student Class</label>
            </td>
            <td class="form-input">

              <!-- Class Options -->
              <select name="student-class" id="student-class" required>
                <option value="">Choose grade</option>
                <option value="kg-1">KG 1</option>
                <option value="kg-2">KG 2</option>
                <option value="grade-1">Grade 1</option>
                <option value="grade-2">Grade 2</option>
                <option value="grade-3">Grade 3</option>
                <option value="grade-4">Grade 4</option>
                <option value="grade-5">Grade 5</option>
                <option value="grade-6">Grade 6</option>
                <option value="grade-7">Grade 7</option>
                <option value="grade-8">Grade 8</option>
                <option value="grade-9">Grade 9</option>
                <option value="grade-10">Grade 10</option>
                <option value="grade-11">Grade 11</option>
                <option value="grade-12">Grade 12</option>
              </select>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Father's Name -->
          <tr class="form-row">
            <td class="form-label">
              <label for="father-name">Father's Name</label>
            </td>
            <td class="form-input">
              <div class="main-body">
                <input type="text" id="father-name" name="father-name" spellcheck="false" autocomplete="off" required>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Father's Mobile Number -->
          <tr class="form-row">
            <td class="form-label">
              <label for="father-number">Father's Mobile Number</label>
            </td>
            <td class="form-input">
              <div class="main-body">
                <input type="tel" id="father-number" name="father-number" autocomplete="on" required>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Mother's Mobile Number -->
          <tr class="form-row">
            <td class="form-label">
              <label for="father-number">Mother's Mobile Number</label>
            </td>
            <td class="form-input">
              <div class="main-body">
                <input type="tel" id="mother-number" name="mother-number" autocomplete="on" required>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- Father's Email -->
          <tr class="form-row">
            <td class="form-label">
              <label for="father-email">Father's Email</label>
            </td>
            <td class="form-input">
              <div class="main-body">
                <input type="email" id="father-email" name="father-email" spellcheck="false" autocomplete="on" required>
                <div class="input-alerts">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                </div>
              </div>
              <small>Error Message</small>
            </td>
          </tr>

          <!-- School Leave Certificate -->
          <tr class="form-row">
            <td class="form-label">
              <label for="leave-certificate">School Leaving Certificate</label>
            </td>
            <td class="form-input">
              <label class="file-upload">
                <div class="upload-button">Add File</div>
                <label class="uploader-single" ondragover="return false">
                  <i class="icon-upload icon"></i>
                  <img src="" class="" id="">
                  <input type="file" accept="image/*" name="leave-certificate" id="leave-certificate" required>
                </label>
                <small>Error Message</small>
              </label>
            </td>
          </tr>

          <!-- Form Buttons -->
          <tr class="form-row">
            <td class="form-label">
              <label for="form-submit">Form Buttons</label>
            </td>
            <td class="form-input">
              <input id="submit-button" class="form-button form-submit" type="submit" value="Submit">
              <input class="form-button form-reset" type="reset" value="Clear All" required>
            </td>
          </tr>

        </table>
      </form> <!-- #registration-form -->
    </section> <!-- #registration -->
  </main>

  <!-- Footer -->
  <?php include('./assets/php/footer.php') ?>

  <!-- Scripts -->
  <script src="assets/js/global-scripts.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/file-uploader-single.js"></script>
  <script src="assets/js/registration.js"></script>
</body>

</html>