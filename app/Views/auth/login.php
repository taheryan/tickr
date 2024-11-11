<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
ورود کاربران
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="login-container">
    <div class="login-form">
        <h2>ورود کاربر</h2>
        <!-- Change method to POST for secure submission -->
        <form method="POST" action="http://localhost/ticket/public/auth/login">
            <!-- CSRF Protection -->
            <?= csrf_field() ?>

            <!-- Username Input -->
            <div class="mb-3">
                <label for="username" class="form-label">نام کاربری</label>
                <!-- Add name attribute to submit data -->
                <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری خود را وارد کنید" required>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">کلمه عبور</label>
                <!-- Add name attribute to submit data -->
                <input type="password" class="form-control" id="password" name="password" placeholder="کلمه عبور خود را وارد کنید" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-primary">ورود</button>

            <!-- Forgot Password Link -->
            <!-- <div class="text-center mt-3">
                <p><a href="#">Forgot your password?</a></p>
            </div> -->
        </form>
    </div>
</div>

<?= $this->endSection() ?>
