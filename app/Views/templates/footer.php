</body>
<style>
    body {
        font-family: "Work Sans", Arial, sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .footer {
        background:
            radial-gradient(700px 120px at 15% 0%, rgba(255, 255, 255, 0.6) 0%, transparent 60%),
            radial-gradient(700px 140px at 85% 10%, rgba(31, 111, 178, 0.10) 0%, transparent 65%),
            linear-gradient(120deg, #f7f2e8, #ffffff 55%, #eaf3ff 100%);
        color: #1f2a44;
        padding: 1.5rem 1.25rem 1rem;
        margin-top: auto;
        font-size: 0.95rem;
        border-top: 1px solid rgba(31, 42, 68, 0.08);
        box-shadow: 0 -8px 18px rgba(0, 0, 0, 0.08);
    }
    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, minmax(160px, 1fr));
        gap: 1rem 1.25rem;
    }
    .footer-section {
        padding: 0 0.25rem;
    }
    .footer-section h3 {
        font-family: "Merriweather", Georgia, serif;
        font-size: 1rem;
        margin: 0 0 0.35rem 0;
        color: #0f3d66;
    }
    .footer-section p {
        margin: 0.2rem 0;
        color: #3a4a6a;
        line-height: 1.4;
    }
    .footer-bottom {
        text-align: center;
        padding-top: 0.8rem;
        margin-top: 1rem;
        border-top: 1px solid rgba(31, 42, 68, 0.12);
        font-size: 0.85rem;
        color: #3a4a6a;
    }
    @media (max-width: 900px) {
        .footer-content {
            grid-template-columns: repeat(2, minmax(180px, 1fr));
        }
    }
    @media (max-width: 600px) {
        .footer {
            font-size: 0.9rem;
            padding: 1.25rem 1rem 0.9rem;
        }
        .footer-content {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        .footer-section h3 {
            font-size: 0.95rem;
        }
    }
 </style>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>Biblioteca Virtual Universitaria</h3>
            <p>Universidad Nacional Experimental Marítima del Caribe</p>
        </div>
        <div class="footer-section">
            <h3>Contacto</h3>
            <p>Teléfono: (0212) 350-0100</p>
            <p>Email: no_replay@umc.edu.ve</p>
        </div>
        <div class="footer-section">
            <h3>Ubicación</h3>
            <p>Av. El Ejército, Catia La Mar 1162, La Guaira</p>
            <p>RIF: G-20003807-1</p>
        </div>
        <div class="footer-section">
            <h3>Horario de Atención</h3>
            <p>Lunes a Domingo: Operativo</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Biblioteca Virtual Universitaria. Todos los derechos reservados.</p>
    </div>
</footer>
</html>
