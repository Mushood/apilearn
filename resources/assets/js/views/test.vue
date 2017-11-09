<template>
  <AbertaMultipleFileUploader
  postURL="http://.."
  method="get"
  successMessagePath=""
  errorMessagePath=""
  headerMessage="Ajouter vos fichiers ici"
  dropAreaMessagePrimary="Dropper ici"
  dropAreaMessageSecondary="Instruction supplementaires"
  fileNameMessage="fileNameMessage"
  fileSizeMessage="fileSizeMessage"
  totalFileMessage="totalFileMessage"
  totalUploadSizeMessage="totalUploadSizeMessage"
  removeFileMessage="removeFileMessage"
  uploadButtonMessage="uploadButtonMessage"
  cancelButtonMessage="cancelButtonMessage"
  :minItems="1"
  :maxItems="2"
  fileUploadErrorMessage="fileUploadFailureMessage"
  minFilesErrorMessage="minFilesMessage"
  maxFilesErrorMessage="maxFilesMessage"
  retryErrorMessage="retryErrorMessage"
  httpMethodErrorMessage="httpMethodErrorMessage"
  >
  </AbertaMultipleFileUploader>
</template>

<script>
    export default {
        mounted() {
            console.log('Component test mounted.');
        },


        data() {
          return {
            title: '',
            body: '',
            picture: "",
            errors: {}
          };
        },

        methods : {

        },

    }
</script>
