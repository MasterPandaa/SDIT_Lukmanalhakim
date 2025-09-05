<style>
  /* WhatsApp Floating Button */
  .whatsapp-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 30px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
    transition: all 0.3s ease;
    z-index: 999; /* below scrollToTop (1000), above content */
  }
  .whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
  }

  /* WhatsApp Popup */
  .whatsapp-popup {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 300px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    z-index: 1001; /* above scrollToTop and FAB */
    display: none;
    animation: slideInUp 0.3s ease;
  }
  .whatsapp-popup.show { display: block; }

  @keyframes slideInUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .whatsapp-popup-header {
    background: #25D366;
    color: white;
    padding: 15px 20px;
    border-radius: 12px 12px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .whatsapp-popup-title { display: flex; align-items: center; gap: 8px; font-weight: 600; }
  .whatsapp-popup-title i { font-size: 18px; }
  .whatsapp-popup-close {
    background: none; border: none; color: white; cursor: pointer; font-size: 16px;
    padding: 0; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;
    border-radius: 50%; transition: background-color 0.3s ease;
  }
  .whatsapp-popup-close:hover { background-color: rgba(255,255,255,0.2); }
  .whatsapp-popup-body { padding: 20px; }
  .whatsapp-message { background: #f0f0f0; padding: 12px 16px; border-radius: 18px; margin-bottom: 15px; position: relative; }
  .whatsapp-message::before {
    content: ''; position: absolute; bottom: -8px; left: 20px; width: 0; height: 0;
    border-left: 8px solid transparent; border-right: 8px solid transparent; border-top: 8px solid #f0f0f0;
  }
  .whatsapp-message p { margin: 0; color: #333; font-size: 14px; line-height: 1.4; }
  .whatsapp-open-chat {
    width: 100%; background: #25D366; color: white; border: none; padding: 12px 20px;
    border-radius: 8px; cursor: pointer; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 8px;
    transition: background-color 0.3s ease;
  }
  .whatsapp-open-chat:hover { background: #128C7E; }
  .whatsapp-open-chat i { font-size: 14px; }

  /* Responsive adjustments */
  @media (max-width: 767.98px) {
    .whatsapp-popup { width: 280px; right: 20px; bottom: 90px; }
    .whatsapp-float { bottom: 20px; right: 20px; width: 55px; height: 55px; font-size: 28px; }
  }
</style>
