  <div data-shell-footer></div>
  </div>
  </div>

  <script>
      const modalHapus = document.getElementById('modalHapus');
      const konfirmasiHapus = document.getElementById('konfirmasiHapus');
      const batalHapus = document.getElementById('batalHapus');

      document.querySelectorAll('.btn-hapus').forEach(function(button) {
          button.addEventListener('click', function(e) {
              e.preventDefault();

              const url = this.getAttribute('data-url');

              konfirmasiHapus.href = url;
              modalHapus.classList.add('show');
          });
      });

      batalHapus.addEventListener('click', function() {
          modalHapus.classList.remove('show');
      });

      modalHapus.addEventListener('click', function(e) {
          if (e.target === modalHapus) {
              modalHapus.classList.remove('show');
          }
      });
  </script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {

          const errorAlert = document.getElementById('auth-alert');

          if (errorAlert) {
              Swal.fire({
                  icon: 'error',
                  title: 'Login gagal',
                  text: errorAlert.dataset.message,
                  confirmButtonText: 'Mengerti',
                  confirmButtonColor: '#2563eb'
              });
          }

          const successAlert = document.getElementById('success-alert');

          if (successAlert) {
              Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: successAlert.dataset.message,
                  confirmButtonText: 'Lanjut',
                  confirmButtonColor: '#2563eb'
              });
          }

      });
  </script>
</body>
</html>

  
  </body>


  </html>