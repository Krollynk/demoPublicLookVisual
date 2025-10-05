# demoPublicLookVisual
Software de gestión de registros clínicos para óptica Look Visual

Descripción detallada: Sistema para la gestión de ópticas, tiene módulos de fichas clinicas, pacientes/clientes, ventas y recibos (no facturas certificadas), registrar y gestionar la información de los laboratorios con los que la óptica trabaja para hacer los pedidos de los lentes o envíos de los aros para que los trabajen, realizar órdenes de compra a los laboratorios así como las guías de contacto para el envío de paquetes y encomiendas a estos laboratorios, gestión de inventarios.

El sistema busca centralizar todo el proceso que se elabora manualmente en las ópticas pequeñas en un software que se adapte a las necesidades básicas, de esta forma poder darle seguimiento a sus pacientes así como brindar un servicio más profesional y ser competitivas ante grandes corporaciones relacionadas a la salud visual.

Versión de PHP: 8.1.10 Versión de SQL: 8.0.30

Modificar solamente la instancia de la base de datos. El sistema tiene una estructura Modelo, Vista, Controlador modificado. Donde el modelo almacena los nombres físicos de los campos de la base de datos y los convierte a nombres lógicos utilizados para las consultas, de esta forma salvaguardar de cierta medida los nombres de los campos, evitando problemas de mapeo externo, ataques, SQL inyection, etc.

Además usa una estructura de consultas bastante fácil de entender.

Esta es una demo pública, por temas de seguridad no se agregó la carpeta del core.
