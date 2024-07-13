from django.db import models
from django.urls import reverse
from save_patient.models import Patient

class Service(models.Model):
    nom_service = models.CharField(max_length=100, null=True)
    type_service = models.CharField(max_length=100)
    patient = models.ManyToManyField(Patient, null=True)

    class Meta:
        db_table='Service'
        verbose_name = "Service"
        verbose_name_plural = "Services"
        app_label = 'care_patient'

    def __str__(self):
        return self.nom_service

    def get_absolute_url(self):
        return reverse("Service_detail", kwargs={"pk": self.pk})

class Employer(models.Model):
    numero_employer = models.IntegerField()
    travail = models.ManyToManyField(Service, through='Travailler')

    class Meta:
        db_table='Employer'
        verbose_name = "Employer"
        verbose_name_plural = "Employers"

    def __str__(self):
        return self.nom_employer

class Facture(models.Model):
    id_patient = models.ForeignKey(Patient, on_delete=models.CASCADE)
    montant_fact = models.IntegerField(default=0)
    service_fact = models.ManyToManyField(Service)
    mode_paiement = models.CharField(max_length=20)
    date_fact = models.DateField(auto_now_add=True)

    class Meta:
        db_table='Facture'
        verbose_name = "Facture"
        verbose_name_plural = "Factures"
        app_label = 'care_patient'

    def __str__(self):
        return str(self.montant_fact)

class Travailler(models.Model):
    id_employer = models.ForeignKey(Employer, on_delete=models.CASCADE)
    id_service = models.ForeignKey(Service, on_delete=models.CASCADE)
    heure_debut = models.DateTimeField()
    heure_fin = models.DateTimeField()
    jour_service = models.DateField()

    class Meta:
        db_table='Travailler'
        unique_together = ('id_employer', 'id_service', 'heure_debut', 'heure_fin', 'jour_service')

class RendezVous(models.Model):
    patient_rdv=models.ForeignKey(Patient, on_delete=models.CASCADE)
    personel_rdv=models.IntegerField()
    jour_rdv=models.DateField()
    heure_rdv=models.TimeField()

    
    class Meta:
        db_table='RendezVous'
        unique_together=('patient_rdv', 'personel_rdv', 'jour_rdv', 'heure_rdv')

class OccupationSalle(models.Model):
    patient_id=models.ForeignKey(Patient, on_delete=models.CASCADE)
    salle_id=models.IntegerField()
    jour_arrive=models.DateTimeField()
    jour_sorti=models.DateTimeField(null=True)


    class Meta:
        db_table="Occupation"
        verbose_name = "Occupation"
        verbose_name_plural = "Occupations"

    def __str__(self):
        return self.patient_id

    def get_absolute_url(self):
        return reverse("Occupation_detail", kwargs={"pk": self.pk})
