//Administracion de Activos

var assetManagement = {
    controlsId: {
        btnAddAsset: "#addAsset",
        dtpAcquisition: "#dtpAcquisition",
        dtpAcquisitionToSave: "#dtpAcquisitionToSave",
        ddlCodCategory: "#codCategory",
        frmNewAsset: "#frmNewAsset",
        frmEditAsset: "#frmEditAsset",
        txtCode: "#code",
        txtBrand: "#brand",
        txtPrice: "#price",
        ddlProvider: "#provider",
        txtSerialNum: "#serialNum",
        txtPlateNum: "#plateNum",
        txtDescription: "#description",
        txtWarrantyTerms: "#terms",
        dtpWarrantyExpiration: "#dtpExpiration",
        warrantyFile: "#warrantyFile",
        moneyField: ".money",
        hddAcquisition: "#hddAcquisition",
        hddIdGarantia: "#hddIdGarantia",
    },
    messages: {
        assetSavedSuccess: "Activo guardado correctamente.",
        assetDeletedSuccess: "Activo inactivado correctamente.",
        assetUpdatedSuccess: "Activo editado correctamente."
    },
    actions:{
        //ADD ASSETS
        fnButtonAddAsset: function () {
           $("#action").val("newAssetForm");
           $("#formAssets").submit();
        },
        fnFormatAssetTable: function () {
            $(assetManagement.actions.fnFormatMoney());
            $(assetManagement.controlsId.moneyField).trigger("mask");
        },
        fnAdditionInitializer: function () {
            //mascaraDeMontos
            $(assetManagement.actions.fnFormatMoney());
        },
        fnFormatMoney: function () {
            $(assetManagement.controlsId.moneyField).maskMoney({
                thousands: '.',
                decimal: ',',
                allowZero: false,
                allowNegative: false
            });
        },
        
        
        //EDIT ASSETS
    }
};



