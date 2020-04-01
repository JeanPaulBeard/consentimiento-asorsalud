<template>
  <v-app>
    <v-container>
      <v-row align="center" justify="center">
        <v-col align="center" justify="center">
          <img src="https://asorsalud.com/images/logo2.png" alt="Asorsalud SM Ltda" />
        </v-col>
      </v-row>
      <v-row align="center" justify="center">
        <v-col align="center" justify="center">
          <h1>Consentimiento informado</h1>
        </v-col>
      </v-row>
    </v-container>

    <v-container v-if="step==1" style="max-width:900px;">
      <v-row align="center" justify="center">
        <v-col align="center" justify="center">
          <p>Para continuar debemos saber algunos datos básicos.</p>
        </v-col>
      </v-row>

      <v-form ref="form" v-model="valid" lazy-validation>
        <v-row align="center" justify="center">
          <v-col cols="6" sm="12">
            <v-text-field
              v-model="name"
              :counter="0"
              :rules="nameRules"
              label="Nombre completo del paciente"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="6" sm="12">
            <v-text-field
              v-model="documento"
              :rules="phoneRules"
              label="Número de documento sin puntos ni espacios"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="6" sm="12">
            <v-text-field
              v-model="phone"
              :rules="documentoRules"
              label="Número de teléfono sin puntos ni espacios"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="6" sm="12">
            <v-text-field v-model="email" :rules="emailRules" label="Correo electrónico" required></v-text-field>
          </v-col>

          <v-col cols="6" sm="12">
            <v-select
              v-model="select"
              :items="items"
              :rules="[v => !!v || 'Por favor elija una opción']"
              label="¿Es menor de edad o requiere de un adulto responsable?"
              required
            ></v-select>
          </v-col>

          <v-col cols="6" sm="12">
            <v-btn color="success" class="mr-4" x-large @click="validate">Continuar</v-btn>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <h1>
              <br />
              <br />
            </h1>
          </v-col>
        </v-row>
      </v-form>
    </v-container>

    <v-container v-if="step==2" style="max-width:900px;">
      <h2>CONSENTIMIENTO INFORMADO PARA USO DE LA TELEMEDICINA</h2>
      <h2>
        <br />
      </h2>
      <p>
        Nombre del Paciente:
        <strong>{{name}}</strong>
      </p>
      <p>
        Numero de Identificacion:
        <strong>{{documento}}</strong>
      </p>
      <p>La telemedicina es la modalidad de provisión de servicios de salud a distancia en los componentes de promoción, prevención, diagnóstico, tratamiento y rehabilitación por profesionales de la salud que utilizan tecnologías de la información y la comunicación que les permiten intercambiar datos con el propósito de facilitar acceso y la oportunidad en la prestación de servicios a la población que presenta limitaciones de oferta, de acceso a los servicios o de ambos en su área geográfica, bajo lo expuesto dentro de la normativa colombiana Artículo 2 ley 1419 de 2010 y las disposiciones donde se establecen los parámetros para la práctica de la telemedicina en el país resolución 2654 de 2019 del Ministerio de la Protección social.</p>
      <p>El objetivo de esta consulta es mejorar la Prestación de servicios especializados habilitados bajo la modalidad de telemedicina en zonas con dificultades de acceso o limitaciones de oferta o ambas, a los pacientes mediante la realización de revisiones extras a la consulta presencial para los casos que se requieran y que se encuentran habilitados bajo la modalidad.</p>
      <p>La tecnología de información y comunicación entendida como los recursos, herramientas, equipos, programas informáticos, aplicaciones, redes y medios que permiten la compilación, procesamiento, almacenamiento transmisión de información como voz, datos, texto, video e imágenes.</p>
      <p>En protección del habeas data, se indica que la información suministrada con ocacion de la presente consulta será confidencial, hará parte de la historia clínica del paciente y solo será utilizada para los fines y objeto de la consulta y atención del paciente.</p>
      <p>Esta modalidad de atención como en cualquier procedimiento médico, hay beneficios esperados y riesgos asociados algunos de los cuales se describen a continuación.</p>
      <p>
        <strong>Potenciales Beneficios</strong>
      </p>

      <ul>
        <li>
          <p>
            Mejor acceso a los servicios de salud permitiendo recibir atención profesional a larga distancia.
            <br />Evaluación y manejo médico más rápido que puede contribuir a mejores resultados.
          </p>
          <p>Disminuye la estancia en hospitales.</p>
        </li>
      </ul>

      <p>Potenciales Riesgos:</p>
      <ul>
        <li>
          <p>Resulta difícil garantizar la confidencialidad de los resultados, consultas documentales de archivos de otros profesionales de datos intercambiados o transmitidos por sistemas la misma o distinta especialidad o entre de telecomunicación.</p>
        </li>
        <li>
          <p>Se hace difícil determinar quién asume la responsabilidad cuando al accionar de cómo mínimo dos médicos se suman y la participación de profesionales de la telecomunicación y la informática, quienes deben asegurar el adecuado mantenimiento de los equipos y del material.</p>
        </li>
        <li>
          <p>Es difícil asegurar la correcta interpretación en zonas aisladas por parte del paciente o de sus familiares cuando sea necesaria su colaboración en la aplicación de medicamentos.</p>
        </li>
      </ul>

      <h3>PACIENTE</h3>
      <p>Manifiesto con la aceptación de la realización de esta consulta, que esta me ha sido explicada, que las dudas han sido respondidas en forma clara y satisfactoria y que he entendido en su integridad el tipo y alcance y objeto de la consulta realizada.</p>
      <p>
        <br />
      </p>
      <!--
      <h3>MEDICO TRATANTE</h3>
      <p>Certifica que he explicado la naturaleza, propósito, ventajas riesgos y alternativas de la consulta de telemedicina al paciente y he brindado respuesta en forma clara y expresa a todas sus inquietudes, considerando que el paciente ha comprendido lo explicado.</p>
      -->
      <v-row>
        <v-col>
          <v-alert outlined type="warning" prominent color="gray" border="left">
            <v-checkbox
              v-model="checkbox"
              :rules="[v => !!v || 'Es necesario aceptar para continuar!']"
              required
            >
              <div slot="label">
                Acepto los
                <a
                  href="https://asorsalud.com/terminosycondiciones.html"
                  target="_blank"
                >términos y condiciones</a> que se encuentran en el consentimiento informado para la atención por telemedicina.
              </div>
            </v-checkbox>
          </v-alert>
        </v-col>
        <v-col cols="auto">
          <v-btn x-large color="success" @click="sendForm()">Firmar consentimiento</v-btn>
        </v-col>
      </v-row>

      <h1>
        <br />
        <br />
      </h1>
    </v-container>

    <v-container v-if="step==3" style="max-width:900px;">
      <v-alert outlined type="success" prominent border="left">
        <h2>Consentimiento enviado.</h2>
      </v-alert>
      <h1>
        <br />
        <br />
        <br />
        <br />
      </h1>
    </v-container>
  </v-app>
</template>



<script>
export default {
  name: "App",

  components: {
    //
  },

  data: () => ({
    step: 1,
    valid: true,
    name: "",
    nameRules: [
      v => !!v || "Nombre es requerido",
      v => (v && v.length >= 8) || "El nombre debe tener mínimo 8 caracteres."
    ],
    documento: "",
    documentoRules: [
      v => !!v || "Documento es requerido",
      v =>
        (v && v.length >= 5) || "El documento debe tener mínimo 5 caracteres."
    ],
    phone: "",
    phoneRules: [
      v => !!v || "Teléfono es requerido",
      v => (v && v.length >= 7) || "El teléfono debe tener mínimo 7 caracteres."
    ],
    email: "",
    emailRules: [
      v => !!v || "Correo es requerido",
      v => /.+@.+\..+/.test(v) || "Correo no valido"
    ],
    select: null,
    items: ["Si", "No"],
    checkbox: false
  }),
  methods: {
    validate() {
      if (this.$refs.form.validate() === true) {
        this.step = 2;
      }
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
    sendForm() {
      if (
        this.name != "" &&
        this.phone != "" &&
        this.phone != "" &&
        this.email != "" &&
        this.select != "" &&
        this.checkbox == true
      ) {
        this.axios
          .post("inc.php", {
            f: "save_consentimiento",
            name: this.name,
            documento: this.documento,
            phone: this.phone,
            email: this.email,
            select: this.select
          })
          .then(response => ((this.info = response), (this.step = 3)));
      } else {
        alert("Debe aceptar los términos y condiciones");
      }
    }
  }
};
</script>
