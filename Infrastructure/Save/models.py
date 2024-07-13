from audioop import reverse
from django.db import models


class Batiment(models.Model):
    photo_batiment=models.ImageField(upload_to='./IS/batiment', default=None, null=True)
    nom_batiment=models.CharField(max_length=100)
    nombre_niveau=models.IntegerField()
    class Meta:
        db_table="Batiment"
        app_label="Save"
        verbose_name ="Batiment"
        verbose_name_plural ="Batiments"

    def __str__(self):
        return self.nom_batiment

    def get_absolute_url(self):
        return reverse("Batiment_detail", kwargs={"pk": self.pk})


class Niveau(models.Model):
    nombre_salle=models.IntegerField()
    batiment=models.ForeignKey(Batiment, on_delete=models.CASCADE)
    class Meta:
        db_table="Niveau"
        app_label="Save"
        verbose_name ="Niveau"
        verbose_name_plural ="Niveaux"

    def __str__(self):
        return f"Niveau {self.id}"

    def get_absolute_url(self):
        return reverse("Niveau_detail", kwargs={"pk": self.pk})


class Salle(models.Model):
    photo_salle=models.ImageField(upload_to='./IS/salle', default=None, null=True)
    nom_salle=models.CharField(max_length=100)
    type_salle=models.CharField(max_length=100)
    niveau_salle=models.ForeignKey(Niveau, on_delete=models.CASCADE)

    class Meta:
        db_table="Salle"
        app_label="Save"
        verbose_name = "Salle"
        verbose_name_plural = "Salles"

    def __str__(self):
        return self.nom_salle

    def get_absolute_url(self):
        return reverse("Salle_detail", kwargs={"pk": self.pk})
    

class Equipement(models.Model):
    photo_equip=models.ImageField(upload_to='./IS/equipement', default=None, null=True)
    nom_equipement=models.CharField(max_length=100)
    type_equipement=models.CharField(max_length=100)
    salle_equipement=models.ManyToManyField(Salle, through="Posseder")
    role_equipement=models.TextField()
    class Meta:
        db_table="Equipement"
        app_label="Save"
        verbose_name ="Equipement"
        verbose_name_plural ="Equipements"

    def __str__(self):
        return self.name

    def get_absolute_url(self):
        return reverse("Equipement_detail", kwargs={"pk": self.pk})



class Posseder(models.Model):
    salle=models.ForeignKey(Salle, on_delete=models.CASCADE)
    equipement=models.ForeignKey(Equipement, on_delete=models.CASCADE)
    jour_arrive=models.DateTimeField()
    jour_sorti=models.DateTimeField(null=True)

    class Meta:
        unique_together=('salle', 'equipement', 'jour_arrive', 'jour_sorti')
        db_table="Posseder"
        app_label="Save"
        verbose_name ="Posseder"
        verbose_name_plural ="Posseders"

    def __str__(self):
        return self.name

    def get_absolute_url(self):
        return reverse("Posseder_detail", kwargs={"pk": self.pk})
