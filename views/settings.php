<section data-cap="settings" class="settings px-1 py-1">
  <div class="container flx flx-c scroll">
    <h1>General settings</h1>            
    <div class="rows flx">
      <ul class="links row">
        <li class="flx" data-cap="password-reset"><i class="fa fa-solid fa-key"></i><span>Reset password</span></li>
        <li class="flx" data-cap="two-factor-auth"><i class="fa fa-solid fa-shield-halved"></i><span>Two factor authentication</span></li>
        <li class="flx" data-cap="login-history"><i class="fa fa-solid fa-user-clock"></i><span>Login history</span></li>
        <li class="flx" data-cap="account-recovery"><i class="fa fa-solid fa-rotate"></i><span>Account recovery</span></li>
      </ul>
      <div class="row confs scroll flx">
        <div data-cap="password-reset" class="section password-reset">
          <h3>Password Reset</h3>
          <form id="password-reset-form">
            <div class="form-group">
              <label for="currentpassword">Current Password:</label>
              <input type="password" id="currentpassword" required>
            </div>
            <div class="form-group">
              <label for="newpassword">New Password:</label>
              <input type="password" id="newpassword" required>
            </div>
            <div class="form-group">
              <button type="submit" id="resetpassword">Reset Password</button>
            </div>
          </form>
        </div>
        <div data-cap="two-factor-auth" class="section two-factor-auth">
          <h3>Two-Factor Authentication</h3>
          <div class="form-group">
            <label class="switch" for="enable-2fa">
              <input type="checkbox" id="enable-2fa">
              <span class="slider round"></span>
            </label>
            <label for="enable-2fa">Enable 2FA</label>
          </div>
        </div>
        <div data-cap="login-history" class="section login-history">
          <h3>Login History</h3>
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Device</th>
              </tr>
            </thead>
            <tbody id="login-history-rows">
              <tr>
                <td>May 1, 2023</td>
                <td>10:30 AM</td>
                <td>New York, NY</td>
                <td>MacBook Pro</td>
              </tr>
              <tr>
                <td>May 2, 2023</td>
                <td>3:15 PM</td>
                <td>San Francisco, CA</td>
                <td>iPhone X</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div data-cap="account-recovery" class="section account-recovery">
        <h3>Account Recovery</h3>
          <form>
            <div class="form-group">
              <label for="phone-number">Phone Number:</label>
              <input type="text" id="phone-number" disabled>
            </div>
            <div class="form-group">
              <label for="email-address">Email Address:</label>
              <input type="email" id="email-address" required>
            </div>
            <div class="form-group">
              <button type="submit" id="update-recovery">Update Recovery Options</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>