SELECT v.idvol, a.immatricule, a.modele, l.nom_aero_dep, l.nom_aero_arr, p.debut, p.fin, v.hdepart, v.harrivee
FROM vol v, avions a, liaisonnom l, periodes p
WHERE v.avions_immatricule = a.immatricule AND v.idliaison = l.idliaison AND v.idperiode = p.idperiode