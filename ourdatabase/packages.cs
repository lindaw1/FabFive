using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Travelexperts
{
    #region Packages
    public class Packages
    {
        #region Member Variables
        protected int _PackageId;
        protected string _PkgName;
        protected unknown _PkgStartDate;
        protected unknown _PkgEndDate;
        protected string _PkgDesc;
        protected string _PkgSubDesc;
        protected unknown _PkgBasePrice;
        protected unknown _PkgAgencyCommission;
        protected int _PkgReviewScore;
        protected int _numPkgReviews;
        protected string _PkgPicUrl;
        #endregion
        #region Constructors
        public Packages() { }
        public Packages(string PkgName, unknown PkgStartDate, unknown PkgEndDate, string PkgDesc, string PkgSubDesc, unknown PkgBasePrice, unknown PkgAgencyCommission, int PkgReviewScore, int numPkgReviews, string PkgPicUrl)
        {
            this._PkgName=PkgName;
            this._PkgStartDate=PkgStartDate;
            this._PkgEndDate=PkgEndDate;
            this._PkgDesc=PkgDesc;
            this._PkgSubDesc=PkgSubDesc;
            this._PkgBasePrice=PkgBasePrice;
            this._PkgAgencyCommission=PkgAgencyCommission;
            this._PkgReviewScore=PkgReviewScore;
            this._numPkgReviews=numPkgReviews;
            this._PkgPicUrl=PkgPicUrl;
        }
        #endregion
        #region Public Properties
        public virtual int PackageId
        {
            get {return _PackageId;}
            set {_PackageId=value;}
        }
        public virtual string PkgName
        {
            get {return _PkgName;}
            set {_PkgName=value;}
        }
        public virtual unknown PkgStartDate
        {
            get {return _PkgStartDate;}
            set {_PkgStartDate=value;}
        }
        public virtual unknown PkgEndDate
        {
            get {return _PkgEndDate;}
            set {_PkgEndDate=value;}
        }
        public virtual string PkgDesc
        {
            get {return _PkgDesc;}
            set {_PkgDesc=value;}
        }
        public virtual string PkgSubDesc
        {
            get {return _PkgSubDesc;}
            set {_PkgSubDesc=value;}
        }
        public virtual unknown PkgBasePrice
        {
            get {return _PkgBasePrice;}
            set {_PkgBasePrice=value;}
        }
        public virtual unknown PkgAgencyCommission
        {
            get {return _PkgAgencyCommission;}
            set {_PkgAgencyCommission=value;}
        }
        public virtual int PkgReviewScore
        {
            get {return _PkgReviewScore;}
            set {_PkgReviewScore=value;}
        }
        public virtual int NumPkgReviews
        {
            get {return _numPkgReviews;}
            set {_numPkgReviews=value;}
        }
        public virtual string PkgPicUrl
        {
            get {return _PkgPicUrl;}
            set {_PkgPicUrl=value;}
        }
        #endregion
    }
    #endregion
}