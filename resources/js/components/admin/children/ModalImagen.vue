<template>
  <v-row justify="center">
       <Toasts
        :rtl="true"
        :max-messages="7"
        :time-out="3000"
        :closeable="false"
      ></Toasts>

    <v-dialog persistent v-model="modalImagen" max-width="500">
      <v-card>
        <v-card-title class="regular">Actualizar Imagen</v-card-title>

        <v-card-text>
          <v-avatar size="avatarSize" style="overflow: unset !important">
            <img
              :src="url ? url : '/img/blankProfile.jpg'"
              alt="alt"
              class="w-50"
            />
          </v-avatar>

          <v-file-input
            v-model="filenames"
            label="Upload Image"
            filled
            prepend-icon="mdi-camera"
            @change="fileChange"
            name="image"
            id="image"
            show-size
          ></v-file-input>

          <v-row style="margin-top: unset !important">
            <v-text-field v-model="txt_titulo" label="Titulo"></v-text-field>
          </v-row>
          <v-row style="margin-top: unset !important">
            <v-textarea
             v-model="txt_descripcion"
              name="input-7-1"
              filled
              label="Descripción"
              auto-grow
            ></v-textarea>
          </v-row>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn color="green darken-1" text @click="hideDialog()">
            Cancelar
          </v-btn>

          <v-btn color="green darken-1" text @click="updateImagen()">
            Actualizar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ["dialogImagen", "authUser", "datos"], //recibe la var del edit energi
  data() {
    return {
      row: null,
      txt_titulo:"",
      txt_descripcion:"",

      filenames: null,
      imageFile: "",

      url: "",
      config: {
        headers: {
          Authorization: "Bearer " + this.authUser.api_token,
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
      },
    };
  },
  computed: {
    modalImagen() {
      if (this.dialogImagen) {
        if (this.datos) {
          this.url = this.datos.url_image;
          this.txt_titulo = this.datos.titulo;
           this.txt_descripcion = this.datos.descripcion;
          this.filenames = null;
        } else {
          this.url = "";
        }
        return this.dialogImagen;
      } else {
        return false;
      }
    },
  },
  created() {},
  methods: {
    hideDialog() {
      this.$parent.$emit("hide_dialog"); // emite el cierre del modal
    },

    updateImagen() {

      const form = new FormData();
      form.append("id_slider",this.datos.id_slider);
      form.append("image", this.imageFile);
      form.append("titulo", this.txt_titulo);
      form.append("descripcion", this.txt_descripcion);

      axios
        .post("/api/update_slider", form, this.config)
        .then((res) => {
          if (res.data) this.$parent.$emit("register_medida");
         this.$toast.success("Se Actualizo..!");
        })
        .catch((err) => console.log(err));
    },

    fileChange(e) {
      if (e) {
        this.imageFile = e;
        this.url = URL.createObjectURL(e);
      } else {
        this.url = "";
      }
    },
  },
};
</script>