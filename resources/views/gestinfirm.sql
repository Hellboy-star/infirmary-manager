 CREATE VIEW dosmed AS SELECT 
    personnels.FONTSA, personnels.TBLIB, personnels.RESSA, personnels.DIRSA, personnels.MATSA, personnels.CATSA, personnels.NOMSA, personnels.PRESA, personnels.LEMSA, personnels.SECSA, personnels.VILSA, personnels.TELSA, personnels.LIESA, personnels.NATSA, personnels.SITSA, personnels.NBRSA, personnels.CHASA, personnels.SSOSA, personnels.SEXSA, personnels.ALLSA, personnels.DNASA, personnels.ANCSA, 
    abs.TYPEABS, abs.CAUSE, abs.DEBUT, abs.REPRISE, abs.NBRARRET, 
    antece.HYPER, antece.HYPO, antece.DIABETE, antece.ULCERE, antece.ASTHME, antece.SINUSITE, antece.HEMOROIDE, antece.EPILEPSIE, antece.DREPANO, antece.HEPATIE, antece.AUTRES, antece.PEC, antece.PRM, antece.PRC, antece.PHTA, antece.PDIABETE, antece.PAUTRE, antece.MHTA, antece.MDIABETE, antece.MAUTRE, antece.FAC, antece.TABAC, antece.ALCOOL, antece.SOF, 
    at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.IPP, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT, 
    convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION, 
    cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS, 
    mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP, 
    poste.POSTE, poste.DENOMINATION, poste.ENTREPRISE, poste.PERIODEDU, poste.PERIODEAU, poste.TACHES, poste.RYTMTAF, poste.FACTEURNUI, poste.METRODATE, poste.METROTYPE, poste.METROR, 
    vac.DATEDOSE, vac.DATEEXP, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE, 
    vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS 
 FROM personnels, abs, antece, at, convocation, cs, mp, poste, vac, vms 
 WHERE personnels.MATSA = abs.MATSA = antece.MATSA = at.MATSA = convocation.MATSA = cs.MATSA = mp.MATSA = poste.MATSA = vac.MATSA = vms.MATSA;


-- SELECT * FROM personnels LEFT JOIN antece ON personnels.MATSA = antece.MATSA;

--         personnels.id, personnels.FONTSA, personnels.TBLIB, personnels.RESSA, personnels.DIRSA, personnels.MATSA, personnels.CATSA, 
--         personnels.NOMSA, personnels.PRESA, personnels.LEMSA, personnels.SECSA, personnels.VILSA, personnels.TELSA, personnels.LIESA, 
--         personnels.NATSA, personnels.SITSA, personnels.NBRSA, personnels.CHASA, personnels.SSOSA, personnels.SEXSA, personnels.ALLSA, 
--         personnels.DNASA, personnels.ANCSA, antece.HYPER, antece.HYPO, antece.DIABETE, antece.ULCERE, antece.ASTHME, antece.SINUSITE, 
--         antece.HEMOROIDE, antece.EPILEPSIE, antece.DREPANO, antece.HEPATIE, antece.AUTRES, antece.PEC, antece.PRM, antece.PRC, antece.PHTA, 
--         antece.PDIABETE, antece.PAUTRE, antece.MHTA, antece.MDIABETE, antece.MAUTRE, antece.FAC, antece.TABAC, antece.ALCOOL, antece.SOF 


-- $empsaa0 = DB::select(" select antece.id, per.id, per.MATSA, concat(NOMSA, '    ', PRESA) as nom, LEMSA, SEXSA,  antece.HYPER, antece.HYPO, 
--         antece.DIABETE, antece.ULCERE, antece.ASTHME, antece.SINUSITE, antece.HEMOROIDE, antece.EPILEPSIE, antece.DREPANO, 
--         antece.HEPATIE, antece.AUTRES, antece.PEC, antece.PRM, antece.PRC, antece.PHTA, antece.PDIABETE, antece.PAUTRE, antece.MHTA, 
--         antece.MDIABETE, antece.MAUTRE, antece.FAC, antece.TABAC, antece.ALCOOL, antece.SOF 
--         from antece , personnels as per where per.id='$personnel->id' AND antece.MATSA = per.MATSA order by antece.id asc"); antecedents


CREATE VIEW dosmed AS SELECT 
    personnels.id, personnels.FONTSA, personnels.TBLIB, personnels.RESSA, personnels.DIRSA, personnels.MATSA, personnels.CATSA, personnels.NOMSA, personnels.PRESA, personnels.LEMSA, personnels.SECSA, personnels.VILSA, personnels.TELSA, personnels.LIESA, personnels.NATSA, personnels.SITSA, personnels.NBRSA, personnels.CHASA, personnels.SSOSA, personnels.SEXSA, personnels.ALLSA, personnels.DNASA, personnels.ANCSA,  
    antece.HYPER, antece.HYPO, antece.DIABETE, antece.ULCERE, antece.ASTHME, antece.SINUSITE, antece.HEMOROIDE, antece.EPILEPSIE, antece.DREPANO, antece.HEPATIE, antece.AUTRES, antece.PEC, antece.PRM, antece.PRC, antece.PHTA, antece.PDIABETE, antece.PAUTRE, antece.MHTA, antece.MDIABETE, antece.MAUTRE, antece.FAC, antece.TABAC, antece.ALCOOL, antece.SOF
 FROM personnels
 LEFT JOIN antece
 ON personnels.MATSA = antece.MATSA;




 SELECT pesonnels.id, personnels.FONTSA, personnels.TBLIB, personnels.RESSA, personnels.DIRSA, personnels.MATSA, personnels.CATSA, personnels.NOMSA, personnels.PRESA, personnels.LEMSA, personnels.SECSA, personnels.VILSA, personnels.TELSA, personnels.LIESA, personnels.NATSA, personnels.SITSA, personnels.NBRSA, personnels.CHASA, personnels.SSOSA, personnels.SEXSA, personnels.ALLSA, personnels.DNASA, personnels.ANCSA, 
    abs.TYPEABS, abs.CAUSE, abs.DEBUT, abs.REPRISE, abs.NBRARRET, 
    antece.HYPER, antece.HYPO, antece.DIABETE, antece.ULCERE, antece.ASTHME, antece.SINUSITE, antece.HEMOROIDE, antece.EPILEPSIE, antece.DREPANO, antece.HEPATIE, antece.AUTRES, antece.PEC, antece.PRM, antece.PRC, antece.PHTA, antece.PDIABETE, antece.PAUTRE, antece.MHTA, antece.MDIABETE, antece.MAUTRE, antece.FAC, antece.TABAC, antece.ALCOOL, antece.SOF, 
    at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.IPP, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT, 
    convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION, 
    cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS, 
    mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP, 
    poste.POSTE, poste.DENOMINATION, poste.ENTREPRISE, poste.PERIODEDU, poste.PERIODEAU, poste.TACHES, poste.RYTMTAF, poste.FACTEURNUI, poste.METRODATE, poste.METROTYPE, poste.METROR, 
    vac.DATEDOSE, vac.DATEEXP, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE, 
    vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS
   FROM personnels, abs, antece, at, convocation, cs, mp, poste, vac, vms 
 WHERE MATSA = $personnel->MATSA AND personnels.MATSA = abs.MATSA  OR personnels.MATSA = antece.MATSA  OR personnels.MATSA = at.MATSA  OR personnels.MATSA = convocation.MATSA  OR personnels.MATSA = cs.MATSA  OR personnels.MATSA = mp.MATSA  OR personnels.MATSA = poste.MATSA  OR personnels.MATSA = vac.MATSA  OR personnels.MATSA = vms.MATSA;





SELECT * FROM personnels
FULL JOIN at ON personnels.MATSA = at.MATSA
FULL JOIN cs ON personnels.MATSA = cs.MATSA
FULL JOIN mp ON personnels.MATSA = mp.MATSA
FULL JOIN vms ON personnels.MATSA = vms.MATSA
FULL JOIN vac ON personnels.MATSA = vac.MATSA
FULL JOIN convocation ON personnels.MATSA = convocation.MATSA
FULL JOIN complet ON personnels.MATSA = complet.MATSA
FULL JOIN abs ON personnels.MATSA = abs.MATSA
FULL JOIN poste ON personnels.MATSA = poste.MATSA
FULL JOIN antece ON personnels.MATSA = antece.MATSA;

 personnels.MATSA = at.MATSA
 personnels.MATSA = cs.MATSA
 personnels.MATSA = mp.MATSA
 personnels.MATSA = vms.MATSA;
  personnels.MATSA = vac.MATSA
 personnels.MATSA = convocation.MATSA
personnels.MATSA = complet.MATSA
 personnels.MATSA = abs.MATSA
 personnels.MATSA = poste.MATSA
 personnels.MATSA = antece.MATSA



SELECT * FROM personnels
UNION SELECT * FROM at 
UNION SELECT * FROM cs 
UNION SELECT * FROM mp 
UNION SELECT * FROM vms
UNION SELECT * FROM vac
UNION SELECT * FROM convocation
UNION SELECT * FROM complet
UNION SELECT * FROM abs
UNION SELECT * FROM poste
UNION SELECT * FROM antece




SELECT 
FONTSA, TBLIB, RESSA, DIRSA, MATSA, CATSA, NOMSA, PRESA, LEMSA, SECSA, VILSA, TELSA, LIESA, NATSA, SITSA, NBRSA, CHASA, SSOSA, SEXSA, ALLSA, DNASA, ANCSA, 
    abs.TYPEABS, abs.CAUSE, abs.DEBUT, abs.REPRISE, abs.NBRARRET, 
    antece.HYPER, antece.HYPO, antece.DIABETE, antece.ULCERE, antece.ASTHME, antece.SINUSITE, antece.HEMOROIDE, antece.EPILEPSIE, antece.DREPANO, antece.HEPATIE, antece.AUTRES, antece.PEC, antece.PRM, antece.PRC, antece.PHTA, antece.PDIABETE, antece.PAUTRE, antece.MHTA, antece.MDIABETE, antece.MAUTRE, antece.FAC, antece.TABAC, antece.ALCOOL, antece.SOF, 
    at.DATECONS, at.DATEACID, at.LIEU, at.CAUSEAT, at.IPP, at.NATURELESI, at.LOCALISLESI, at.DATE1CNSSAT, at.DATE2CNSSAT, at.AVISCNSSAT, at.NBRARRETAT, at.TRAITEMENTAT, at.MESECORRECT, at.OBSERVATIONAT, 
    convocation.MOTIF, convocation.DATEEMIS, convocation.DATECONVOC, convocation.DATEPRES, convocation.OBSERVATION, 
    cs.POIDSCS, cs.TAILLECS, cs.DATECS, cs.TCS, cs.POULSCS, cs.TACS, cs.PLAINTESCS, cs.EXAMCLICS, cs.BILAN, cs.DIAGNOSTIC, cs.TRAITEMENTCS, cs.OBSERVATIONCS, 
    mp.DATEMP, mp.MPNUMTAB, mp.MPDESIGNATION, mp.MALCARAPRO, mp.AGENTPATH, mp.DATE1CNSSMP, mp.DATE2CNSSMP, mp.AVISCNSSMP, mp.TRAITEMENTMP, mp.OBSERVATIONMP, 
    poste.POSTE, poste.DENOMINATION, poste.ENTREPRISE, poste.PERIODEDU, poste.PERIODEAU, poste.TACHES, poste.RYTMTAF, poste.FACTEURNUI, poste.METRODATE, poste.METROTYPE, poste.METROR, 
    vac.DATEDOSE, vac.DATEEXP, vac.VACCIN, vac.LOT, vac.TYPE, vac.DOSE, vac.CENTRE, vac.DATE, 
    vms.POIDSVMS, vms.DATEVMS, vms.TYPVISI, vms.POULSVMS, vms.PLAINTESVMS, vms.TAVMS, vms.PA, vms.PTI, vms.PTE, vms.AVOD, vms.AVOG, vms.EXAMCLIVMS, vms.BILANVMS, vms.AVISP, vms.CONCLMED, vms.APTITUDE, vms.OBSERVATIONVMS
FROM personnels
FULL JOIN at ON personnels.MATSA = at.MATSA,
FULL JOIN cs ON personnels.MATSA = cs.MATSA,
FULL JOIN mp ON personnels.MATSA = mp.MATSA,
FULL JOIN vms ON personnels.MATSA = vms.MATSA,
FULL JOIN vac ON personnels.MATSA = vac.MATSA,
FULL JOIN convocation ON personnels.MATSA = convocation.MATSA,
FULL JOIN complet ON personnels.MATSA = complet.MATSA,
FULL JOIN abs ON personnels.MATSA = abs.MATSA,
FULL JOIN poste ON personnels.MATSA = poste.MATSA,
FULL JOIN antece ON personnels.MATSA = antece.MATSA;








SELECT
    personnels.FONTSA,
    personnels.TBLIB,
    personnels.RESSA,
    personnels.DIRSA,
    personnels.MATSA,
    personnels.CATSA,
    personnels.NOMSA,
    personnels.PRESA,
    personnels.LEMSA,
    personnels.SECSA,
    personnels.VILSA,
    personnels.TELSA,
    personnels.LIESA,
    personnels.NATSA,
    personnels.SITSA,
    personnels.NBRSA,
    personnels.CHASA,
    personnels.SSOSA,
    personnels.SEXSA,
    personnels.ALLSA,
    personnels.DNASA,
    personnels.ANCSA,
    ABS.TYPEABS,
    ABS.CAUSE,
    ABS.DEBUT,
    ABS.REPRISE,
    ABS.NBRARRET,
    antece.HYPER,
    antece.HYPO,
    antece.DIABETE,
    antece.ULCERE,
    antece.ASTHME,
    antece.SINUSITE,
    antece.HEMOROIDE,
    antece.EPILEPSIE,
    antece.DREPANO,
    antece.HEPATIE,
    antece.AUTRES,
    antece.PEC,
    antece.PRM,
    antece.PRC,
    antece.PHTA,
    antece.PDIABETE,
    antece.PAUTRE,
    antece.MHTA,
    antece.MDIABETE,
    antece.MAUTRE,
    antece.FAC,
    antece.TABAC,
    antece.ALCOOL,
    antece.SOF,
    AT.DATECONS,
    AT.DATEACID,
    AT.LIEU,
    AT.CAUSEAT,
    AT.IPP,
    AT.NATURELESI,
    AT.LOCALISLESI,
    AT.DATE1CNSSAT,
    AT.DATE2CNSSAT,
    AT.AVISCNSSAT,
    AT.NBRARRETAT,
    AT.TRAITEMENTAT,
    AT.MESECORRECT,
    AT.OBSERVATIONAT,
    convocation.MOTIF,
    convocation.DATEEMIS,
    convocation.DATECONVOC,
    convocation.DATEPRES,
    convocation.OBSERVATION,
    cs.POIDSCS,
    cs.TAILLECS,
    cs.DATECS,
    cs.TCS,
    cs.POULSCS,
    cs.TACS,
    cs.PLAINTESCS,
    cs.EXAMCLICS,
    cs.BILAN,
    cs.DIAGNOSTIC,
    cs.TRAITEMENTCS,
    cs.OBSERVATIONCS,
    mp.DATEMP,
    mp.MPNUMTAB,
    mp.MPDESIGNATION,
    mp.MALCARAPRO,
    mp.AGENTPATH,
    mp.DATE1CNSSMP,
    mp.DATE2CNSSMP,
    mp.AVISCNSSMP,
    mp.TRAITEMENTMP,
    mp.OBSERVATIONMP,
    poste.POSTE,
    poste.DENOMINATION,
    poste.ENTREPRISE,
    poste.PERIODEDU,
    poste.PERIODEAU,
    poste.TACHES,
    poste.RYTMTAF,
    poste.FACTEURNUI,
    poste.METRODATE,
    poste.METROTYPE,
    poste.METROR,
    vac.DATEDOSE,
    vac.DATEEXP,
    vac.VACCIN,
    vac.LOT,
    vac.TYPE,
    vac.DOSE,
    vac.CENTRE,
    vac.DATE,
    vms.POIDSVMS,
    vms.DATEVMS,
    vms.TYPVISI,
    vms.POULSVMS,
    vms.PLAINTESVMS,
    vms.TAVMS,
    vms.PA,
    vms.PTI,
    vms.PTE,
    vms.AVOD,
    vms.AVOG,
    vms.EXAMCLIVMS,
    vms.BILANVMS,
    vms.AVISP,
    vms.CONCLMED,
    vms.APTITUDE,
    vms.OBSERVATIONVMS
FROM
    personnels,
    ABS,
    antece,
    AT,
    convocation,
    cs,
    mp,
    poste,
    vac,
    vms
WHERE
    MATSA = $personnel - > MATSA AND personnels.MATSA = ABS.MATSA OR personnels.MATSA = antece.MATSA OR personnels.MATSA = AT.MATSA OR personnels.MATSA = convocation.MATSA OR personnels.MATSA = cs.MATSA OR personnels.MATSA = mp.MATSA OR personnels.MATSA = poste.MATSA OR personnels.MATSA = vac.MATSA OR personnels.MATSA = vms.MATSA;



SELECT
    personnels.FONTSA,
    personnels.TBLIB,
    personnels.RESSA,
    personnels.DIRSA,
    personnels.MATSA,
    personnels.CATSA,
    personnels.NOMSA,
    personnels.PRESA,
    personnels.LEMSA,
    personnels.SECSA,
    personnels.VILSA,
    personnels.TELSA,
    personnels.LIESA,
    personnels.NATSA,
    personnels.SITSA,
    personnels.NBRSA,
    personnels.CHASA,
    personnels.SSOSA,
    personnels.SEXSA,
    personnels.ALLSA,
    personnels.DNASA,
    personnels.ANCSA,
    antece.HYPER,
    antece.HYPO,
    antece.DIABETE,
    antece.ULCERE,
    antece.ASTHME,
    antece.SINUSITE,
    antece.HEMOROIDE,
    antece.EPILEPSIE,
    antece.DREPANO,
    antece.HEPATIE,
    antece.AUTRES,
    antece.PEC,
    antece.PRM,
    antece.PRC,
    antece.PHTA,
    antece.PDIABETE,
    antece.PAUTRE,
    antece.MHTA,
    antece.MDIABETE,
    antece.MAUTRE,
    antece.FAC,
    antece.TABAC,
    antece.ALCOOL,
    antece.SOF
FROM
    personnels,
    antece
WHERE
    personnels.MATSA = antece.MATSA;