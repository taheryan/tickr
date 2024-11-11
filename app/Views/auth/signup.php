<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
ثبت نام کاربران
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="login-container">
    <div class="login-form">
        <h2>ثبت نام کاربر</h2>
        <form method="POST" action="http://localhost/tickr/public/auth/register">
            <!-- Username Input -->
            <div class="mb-3">
                <label for="username" class="form-label">نام کاربری</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری خود را وارد کنید" required>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">کلمه عبور</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="کلمه عبور خود را وارد کنید" required>
            </div>

            <!-- Role Selection -->
            <div class="mb-3">
                <label for="role" class="form-label">نقش کاربری</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="user">کاربر</option>
                    <option value="admin">مدیر</option>
                    <option value="support">پشتیبانی</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">ثبت نام</button>

        </form>
    </div>
</div>

<?= $this->endSection() ?>
