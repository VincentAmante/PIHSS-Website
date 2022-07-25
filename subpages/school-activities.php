<!-- School Activities-->

<!-- Overview -->
<div class=" content-text" id="overview">
    <div class=" h1-border">
        <span></span>

        <h1 id="tab-header">Co-Curricular Activities</h1>
    </div>

    <p class="tab-overview">
        Co-Curricular activities are an essential part of educational process. It enriches and broadens students'
        minds and forms an integral part of the curriculum. The school is implementing activities/interactive based
        teaching strategies. It helps to develop an all-round personality of the students to face the challenges of
        the fast changing world experience and accolades gained through many of these activities help them during
        internships and other work programs.
    </p>
    <p class="tab-overview">
        The aim of the curricular activities is to make the students mentally fit to develop a sense of competitive
        spirit, co-operation, leadership, diligence, punctuality, team spirit as well as to provide a backdrop for the
        development of their creative talents. Therefore, such activities have been integrated into the school calendar.
        These activities comprises of Essay Writing Competitions, Elocution and Debates, Quiz Competitions, Dramatics,
        Morning Assembly Programmes and Annual Sports to name a few.
    </p>
</div>

<!-- Content -->
<div class="tab-content" id="school-activities">
    <div class="school-activities-heading">
        <h1>Extra-Curricular Activities</h1>
        <p>
            The school encourages all round development of its students with a planned series of extracurricular
            activities throughout the academic year. Extracurricular activities help them to socialize with
            other students. The school offers a variety of extracurricular activities for its students including
            fun fair, field trips, school picnics etc.
        </p>
    </div> <!-- .school-activities-heading -->

    <div class="co-curricular-list" id="co-curricular-activities">

    </div> <!-- #co-curricular-activities -->
</div> <!-- #school-activities -->

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(() => {
        $.ajax({
            type: "GET",
            url: "./admin/assets/functions/get-activities.php",
            dataType: "html",
            success: (data) => {
                $('#co-curricular-activities').html(data);
            }
        })
    });
</script>