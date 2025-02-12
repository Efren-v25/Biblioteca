</body>
<style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .footer {
        background-color: #FFF9C4;
        color: #000000;
        padding: 0.5rem 0.25rem;
        margin-top: auto;
        font-size: 0.7rem;
    }
    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .footer-section {
        flex: 1 1 150px;
        margin-bottom: 0.25rem;
        padding: 0 0.25rem;
    }
    .footer-section h3 {
        font-size: 0.8rem;
        margin: 0 0 0.2rem 0;
    }
    .footer-section p {
        margin: 0.1rem 0;
    }
    .footer-bottom {
        text-align: center;
        padding-top: 0.25rem;
        margin-top: 0.25rem;
        border-top: 1px solid #00000033;
        font-size: 0.65rem;
    }
    @media (max-width: 768px) {
        .footer {
            font-size: 0.65rem;
            padding: 0.5rem 0.15rem;
        }
        .footer-content {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.25rem;
        }
        .footer-section {
            margin-bottom: 0.15rem;
        }
        .footer-section h3 {
            font-size: 0.75rem;
            margin-bottom: 0.1rem;
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