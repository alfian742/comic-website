<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-4" style="margin-top: 5rem;">
    <h2 class="mb-4 text-center fw-bold">About Me</h2>
    <div class="row align-items-center">
        <div class="col-md-6">
            <img class="d-block mx-auto mb-4 img-section" src="<?= base_url('assets/img/programmer.svg'); ?>" alt="Programmer">
        </div>
        <div class="col-md-6">
            <p>I study at Mataram Technology University</p>

            <div class="table-responsive my-3">
                <table class="table table-borderless align-middle">
                    <tr>
                        <td>Faculty</td>
                        <td>:</td>
                        <td>Technology, Information, and Communication</td>
                    </tr>
                    <tr>
                        <td>Program Study</td>
                        <td>:</td>
                        <td>Informatics</td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>:</td>
                        <td>Informatics - B</td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>6th</td>
                    </tr>
                </table>
            </div>

            <p>I'm passionate about coding and UI/UX</p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>