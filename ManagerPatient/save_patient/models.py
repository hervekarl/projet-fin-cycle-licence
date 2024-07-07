from django.db import models


class Patient(models.Model):
    photo_patient = models.ImageField(upload_to="Photo_patients", null=True)
    nom_patient = models.CharField(max_length=80)
    prenom_patient = models.CharField(max_length=80)
    date_nais_pat = models.DateField(null=True)
    age_patient = models.IntegerField()
    sexe_patient = models.CharField(max_length=1)
    adresse_patient = models.CharField(max_length=100)
    tel_patient = models.CharField(max_length=13)

   

    class Meta:
        verbose_name = "Patient"
        verbose_name_plural = "Patients"
        app_label = 'save_patient'
        db_table = 'Patient'

    def __str__(self) -> str:
        return self.nom_patient