@if(config('whatsapp.enabled', true))

 

<div class="whatsapp-float" onclick="toggleWhatsAppPopup()">
  <i class="fab fa-whatsapp"></i>
</div>

<div id="whatsapp-popup" class="whatsapp-popup">
  <div class="whatsapp-popup-content">
    <div class="whatsapp-popup-header">
      <div class="whatsapp-popup-title">
        <i class="fab fa-whatsapp"></i>
        <span>{{ config('whatsapp.admin_name', 'Admin eLHaeS') }}</span>
      </div>
      <button class="whatsapp-popup-close" onclick="closeWhatsAppPopup()">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="whatsapp-popup-body">
      <div class="whatsapp-message">
        <p>{{ config('whatsapp.popup_message', 'Assalamualikum, ada yang bisa kami bantu?') }}</p>
      </div>
      <button class="whatsapp-open-chat" onclick="openWhatsAppChat()">
        <i class="fas fa-paper-plane"></i>
        Open chat
      </button>
    </div>
  </div>
</div>

@push('scripts')
<script>
  function toggleWhatsAppPopup() {
    const popup = document.getElementById('whatsapp-popup');
    if (popup) popup.classList.toggle('show');
  }
  function closeWhatsAppPopup() {
    const popup = document.getElementById('whatsapp-popup');
    if (popup) popup.classList.remove('show');
  }
  function openWhatsAppChat() {
    const phoneNumber = @json(config('whatsapp.phone_number'));
    const message = @json(config('whatsapp.default_message'));
    if (!phoneNumber) return;
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message || '')}`;
    window.open(whatsappUrl, '_blank');
    closeWhatsAppPopup();
  }
  // Close popup when clicking outside
  document.addEventListener('click', function(event) {
    const popup = document.getElementById('whatsapp-popup');
    const floatBtn = document.querySelector('.whatsapp-float');
    if (!popup || !floatBtn) return;
    if (!popup.contains(event.target) && !floatBtn.contains(event.target)) {
      popup.classList.remove('show');
    }
  });
  // Auto show popup after configured delay (ms) if provided
  document.addEventListener('DOMContentLoaded', function() {
    const delay = Number(@json(config('whatsapp.auto_open_delay_ms', null)));
    if (Number.isFinite(delay) && delay > 0) {
      setTimeout(() => { const p = document.getElementById('whatsapp-popup'); if (p) p.classList.add('show'); }, delay);
    }
  });
</script>
@endpush

@endif
