from audioop import reverse
from django.db import models



class Service(models.Model):
    nom_service = models.CharField(max_length=100)
    type_service = models.CharField(max_length=100)
    

    class Meta:
        verbose_name = "Service"
        verbose_name_plural = "Services"
        app_label = 'save_employer'
        db_table = 'Service'
        # Aucun besoin de spécifier une base de données spécifique ici

    def __str__(self):
        return self.nom_service

    def get_absolute_url(self):
        return reverse("Service_detail", kwargs={"pk": self.pk})
    

class FonctionsEmp(models.Model):
    nom_fonction=models.CharField(max_length=100)
    description=models.TextField()

    class Meta:
        verbose_name = "FonctionsEmp"
        verbose_name_plural ="FonctionsEmps"
        app_label = 'save_employer'
        db_table = 'Fonction'

    def __str__(self):
        return self.nom_fonction

    def get_absolute_url(self):
        return reverse("FonctionsEmp_detail", kwargs={"pk": self.pk})

    


class Employer(models.Model):
    nom_employer = models.CharField(max_length=100)
    prenom_employer = models.CharField(max_length=100)
    sexe_employer = models.CharField(max_length=100)
    specialite = models.CharField(max_length=100, null=True)
    adresse_employer = models.CharField(max_length=150)
    tel_employer = models.CharField(max_length=13)
    compte_employer = models.CharField(max_length=100, null=True)
    salaire_employer = models.CharField(max_length=100, null=True)
    fonction=models.ForeignKey(FonctionsEmp, on_delete=models.SET_NULL, null=True)
    service=models.ManyToManyField(Service)

    class Meta:
        verbose_name = "Employer"
        verbose_name_plural = "Employers"
        app_label = 'save_employer'
        db_table = 'Employer'
        # Aucun besoin de spécifier une base de données spécifique ici

    def __str__(self):
        return self.nom_employer
